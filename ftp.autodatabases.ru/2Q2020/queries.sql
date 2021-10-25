----------------------------------------------------------------------------------------------------------------
1. List makes by type on XX language
----------------------------------------------------------------------------------------------------------------
'P' -> passenger cars
'O' -> commercial vehicles
'PO' -> both passenger cars and commercial vehicles
'M' -> motors
'A' -> axles
'K' -> body types
----------------------------------------------------------------------------------------------------------------
SELECT manuId, manuName FROM manufacturers WHERE linkingTargetType = 'P' AND lang = 'XX'
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
2. List models by make ID and car type on XX language
----------------------------------------------------------------------------------------------------------------
SELECT modelId, modelname FROM modelSeries WHERE manuId='16' and linkingTargetType = 'P' AND lang = 'XX'
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
3. List car modifications by car type, model ID, manufacturer ID on XX language
----------------------------------------------------------------------------------------------------------------
SELECT carId,carName FROM cars WHERE lang='XX' and carType='P' and modId='1474' and manuId='77'
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
4. Get manufacturer name by manufacturer ID, car type on XX language
----------------------------------------------------------------------------------------------------------------
SELECT manuName FROM manufacturers where manuId='16' and linkingTargetType='P' and lang='XX'
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
5. Get model name by manufacturer ID, model ID, car type on XX language
----------------------------------------------------------------------------------------------------------------
SELECT modelName FROM modelSeries where manuId='16' and modelId='6713' and linkingTargetType='P' and lang='XX'
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
6. Get modification name by car ID on XX language
----------------------------------------------------------------------------------------------------------------
SELECT carName FROM cars where carId='55639' and lang='XX'
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
7. First level of assembly groups by carId and shortCutId on XX language
----------------------------------------------------------------------------------------------------------------
select * from (
                  SELECT       
                           v.id,
                           v.assemblyGroupNodeId,
                           v.parentNodeId,
                           a.shortCutId,
                           a.lang as lang,
                        ifnull(a.assemblyGroupName,'missing name') as assemblyGroupName ,
                        ifnull(a.hasChilds,0) as hasChilds,
                            (select  genericArticleId from articlesVehicleTrees t 
                             where  v.assemblyGroupNodeId=t.assemblyGroupNodeId and v.carId=t.linkingTargetId limit 1) as genericArticleId
                  from vehicleTrees v
                           left join assemblyGroupNodesNames a on v.assemblyGroupNodeId = a.assemblyGroupNodeId and
                                                             v.linkingTargetType = a.linkingTargetType and
                                                             a.lang = "en"
                                                             
                           
           
                  
                where carId =14446
                    and a.shortCutId = 18
                   
            ) s
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------           
7.1 List of articles by carId, linkingTargetType and assemblyGroupNodeId on XX language
----------------------------------------------------------------------------------------------------------------
SELECT
    v.assemblyGroupNodeId, 
    v.parentNodeId, 
    v.sortNo, 
    a.articleCountry, 
    genericArticlesGroups.designation, 
    genericArticlesGroups.masterDesignation, 
    genericArticlesGroups.usageDesignation, 
    a.batchSize2, 
    a.batchSize1, 
    a.isAccessory, 
    a.isRemanufacturedPart, 
    a.hasMandatoryMaterialCertification, 
    a.isSelfServicePacking, 
    a.quantityPerPartPerPackage, 
    a.quantityPerPackage, 
    a.articleStatusDescription, 
    a.articleStatusValidFromDate, 
    a.articleStatusId, 
    a.additionalDescription, 
    a.mfrName, 
    a.mfrId, 
    a.dataSupplierId, 
    a.articleNumber, 
    a.legacyArticleId
FROM
    vehicleTrees AS v
    LEFT JOIN
    articles AS a
    ON 
        a.assemblyGroupNodeId = v.assemblyGroupNodeId AND
        a.lang = 'XX'
    INNER JOIN
    assemblyGroupNodesNames
    ON 
        v.assemblyGroupNodeId = assemblyGroupNodesNames.assemblyGroupNodeId AND
        v.parentNodeId = assemblyGroupNodesNames.parentNodeId AND
        assemblyGroupNodesNames.lang = 'XX'
    left JOIN
    genericArticlesGroups
    ON 
        a.genericArticleId = genericArticlesGroups.genericArticleId AND
        genericArticlesGroups.lang = 'XX'
WHERE
    v.carId = '14446' AND
    v.assemblyGroupNodeId = '103129' AND
    v.linkingTargetType = 'L'
group by a.legacyArticleId,v.assemblyGroupNodeId
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
8. Sub level of assembly groups by car type and parent node ID on XX language
----------------------------------------------------------------------------------------------------------------
SELECT assemblyGroupNodeId,assemblyGroupName,hasChilds,parentNodeId FROM assemblyGroupNodesNames where assemblyGroupNodeId='parentNodeId' and linkingTargetType='P' and lang='XX'
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
9. Name of assembly group by its ID on XX language
----------------------------------------------------------------------------------------------------------------
SELECT assemblyGroupName FROM assemblyGroupNodes where assemblyGroupNodeId='assemblyGroupNodeId' and linkingTargetType='P' and lang='XX'
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
10. Assembly groups by car ID, assembly group ID, car type on XX language
----------------------------------------------------------------------------------------------------------------
SELECT * FROM `vehicleTrees` v LEFT JOIN articles a ON a.assemblyGroupNodeId=v.assemblyGroupNodeId WHERE v.carId='55639' and v.assemblyGroupNodeId='100452' and v.linkingTargetType='P' and a.lang='XX'
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
11. List of legacy article IDs by OE number and manufacturer ID
----------------------------------------------------------------------------------------------------------------
SELECT o.articleNumber, o.mfrName, group_concat(o.legacyArticleId) as legacyArticleIds
FROM `oemNumbers` o
WHERE o.articleNumber='MZ690070' and o.mfrId='77'
GROUP by o.articleNumber
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
12. Get article criteria by article number
----------------------------------------------------------------------------------------------------------------
SELECT * FROM `articles` a LEFT JOIN articleCriteria c on c.legacyArticleId=a.legacyArticleId WHERE a.articleNumber like '0 451 103 364' GROUP BY c.criteriaId
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
13. Get article applicability to cars by article number
----------------------------------------------------------------------------------------------------------------
SELECT * FROM `articles` a LEFT JOIN vehicleTrees v on v.assemblyGroupNodeId=a.assemblyGroupNodeId WHERE a.articleNumber='BFO4102' GROUP BY v.carId
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
14. Get replaced by articles by article number
----------------------------------------------------------------------------------------------------------------
SELECT * FROM `articles` a LEFT JOIN replacedByArticles r on r.legacyArticleId=a.legacyArticleId WHERE a.articleNumber like '54564' group by r.articleNumber
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
15. Search article by EAN code
----------------------------------------------------------------------------------------------------------------
SELECT distinct 
    articles.dataSupplierId,
    articles.articleNumber,
    articles.mfrId,
    articles.mfrName
FROM
    articleEAN
    LEFT JOIN articles ON articleEAN.legacyArticleId = articles.legacyArticleId 
WHERE
    articleEAN.eancode = '4053082224556'
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
16. Search car ID by motor code
----------------------------------------------------------------------------------------------------------------
SELECT DISTINCT vehicleMotorCodes.motorCode, vehicleMotorCodes.carId
FROM vehicleMotorCodes WHERE vehicleMotorCodes.motorCode = '116 C 076'
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
17. List of articles on XX language (for language code see languages table)
----------------------------------------------------------------------------------------------------------------
SELECT DISTINCT
    articles.dataSupplierId,
    articles.articleNumber,
    genericArticlesGroups.masterDesignation AS Description,
    articles.additionalDescription,
    keyValues.keyValue AS articleStatusDescription,
    articles.articleStatusValidFromDate,
    articles.quantityPerPackage,
    articles.quantityPerPartPerPackage,
    articles.isSelfServicePacking,
    articles.hasMandatoryMaterialCertification,
    articles.isRemanufacturedPart,
    articles.isAccessory,
    articles.batchSize1,
    articles.batchSize2,
    articles.legacyArticleId,
    keyValues.lang AS lang,
    articles.articleCountry 
FROM
    articles
    LEFT JOIN keyValues ON keyValues.keyId = articles.articleStatusId AND keyValues.keyTableId = 073
    LEFT JOIN genericArticlesGroups ON genericArticlesGroups.genericArticleId = articles.genericArticleId 
    AND genericArticlesGroups.lang = keyValues.lang 
WHERE
    keyValues.lang = 'XX'
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
18. Search in articles on XX language where articleNumber is 'YYY' (for language code see languages table)
----------------------------------------------------------------------------------------------------------------
SELECT DISTINCT
    articles.dataSupplierId,
    articles.articleNumber,
    genericArticlesGroups.masterDesignation AS Description,
    articles.additionalDescription,
    keyValues.keyValue AS articleStatusDescription,
    articles.articleStatusValidFromDate,
    articles.quantityPerPackage,
    articles.quantityPerPartPerPackage,
    articles.isSelfServicePacking,
    articles.hasMandatoryMaterialCertification,
    articles.isRemanufacturedPart,
    articles.isAccessory,
    articles.batchSize1,
    articles.batchSize2,
    articles.legacyArticleId,
    keyValues.lang AS lang,
    articles.articleCountry 
FROM
    articles
    LEFT JOIN keyValues ON keyValues.keyId = articles.articleStatusId AND keyValues.keyTableId = 073
    LEFT JOIN genericArticlesGroups ON genericArticlesGroups.genericArticleId = articles.genericArticleId 
    AND genericArticlesGroups.lang = keyValues.lang 
WHERE
    keyValues.lang = 'XX' and articles.articleNumber = 'YYY'
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
19. Reindex all data into searchIndex table (long query)
----------------------------------------------------------------------------------------------------------------
insert ignore into searchIndex (legacyArticleId,keywords)
SELECT articles.legacyArticleId,concat_ws(",",articles.articleNumber,UPPER(REGEXP_REPLACE(articles.articleNumber,'[^a-z0-9]','')),articleEAN.eancode,UPPER(REGEXP_REPLACE(oemNumbers.articleNumber,'[^a-z0-9]','')),manufacturers.manuName,replacedByArticles.articleNumber,UPPER(REGEXP_REPLACE(replacedByArticles.articleNumber,'[^a-z0-9]','')),amBrand.brandName, tradeNumbers.tradeNumber,UPPER(REGEXP_REPLACE(tradeNumbers.tradeNumber,'[^a-z0-9]','')),replacesArticles.articleNumber,UPPER(REGEXP_REPLACE(replacesArticles.articleNumber,'[^a-z0-9]',''))) AS keywords
FROM
articles
LEFT JOIN articleEAN ON articles.legacyArticleId = articleEAN.legacyArticleId
LEFT JOIN oemNumbers ON articles.legacyArticleId = articleEAN.legacyArticleId AND articles.assemblyGroupNodeId = articleEAN.legacyArticleId
LEFT JOIN manufacturers ON oemNumbers.mfrId = manufacturers.manuId
LEFT JOIN replacedByArticles ON articles.legacyArticleId = replacedByArticles.legacyArticleId AND articles.assemblyGroupNodeId = replacedByArticles.assemblyGroupNodeId
LEFT JOIN amBrand ON replacedByArticles.dataSupplierId = replacedByArticles.assemblyGroupNodeId
LEFT JOIN tradeNumbers ON articles.legacyArticleId = replacedByArticles.assemblyGroupNodeId
left JOIN replacesArticles ON articles.legacyArticleId = replacedByArticles.assemblyGroupNodeId AND articles.assemblyGroupNodeId = replacedByArticles.assemblyGroupNodeId
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
20. Select vehicle details on YY language by carId (for language code see languages table)
----------------------------------------------------------------------------------------------------------------
set @lang='YY';

SELECT
v.carId,
v.ccmTech,
k2.keyValue as constructionType,
v.cylinder,
v.cylinderCapacityCcm,
v.cylinderCapacityLiter,
k.keyValue as fuelType,
k3.keyValue as fuelTypeProcess,
k5.keyValue as impulsionType,
v.manuId,
v.manuName,
v.modId,
v.modelName,
k4.keyValue as motorType,
v.powerHpFrom,
v.powerHpTo,
v.powerKwFrom,
v.powerKwTo,
v.typeName,
v.typeNumber,
v.valves,
v.yearOfConstrFrom,
v.yearOfConstrTo,
v.axisConfiguration,
v.tonnage,
v.brakeSystem
FROM
vehicleDetails AS v
left JOIN keyValues AS k ON v.fuelTypeKeyTableId = k.keyTableId AND v.fuelTypeKeyId = k.keyId and k.lang=@lang
left JOIN keyValues AS k2 ON v.constructionTypeKeyTableId = k2.keyTableId AND v.constructionTypeKeyId = k2.keyId and k2.lang=@lang
left JOIN keyValues AS k3 ON v.fuelTypeProcessKeyTableId = k3.keyTableId AND v.fuelTypeProcessKeyId = k3.keyId and k3.lang=@lang
left JOIN keyValues AS k4 ON v.motorTypeKeyTableId = k4.keyTableId AND v.motorTypeKeyId = k4.keyId and k4.lang=@lang
left JOIN keyValues AS k5 ON v.impulsionTypeKeyId = k5.keyId AND v.impulsionTypeKeyTableId = k5.keyTableId and k5.lang=@lang
where v.carId='XX'
group by v.carId
----------------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------------
21. Create vehicle details table filled with data on YY language (for language code see languages table)
----------------------------------------------------------------------------------------------------------------
set @lang='YY';
create table vehicleDetails as 
SELECT
v.carId,
v.ccmTech,
k2.keyValue as constructionType,
v.cylinder,
v.cylinderCapacityCcm,
v.cylinderCapacityLiter,
k.keyValue as fuelType,
k3.keyValue as fuelTypeProcess,
k5.keyValue as impulsionType,
v.manuId,
v.manuName,
v.modId,
v.modelName,
k4.keyValue as motorType,
v.powerHpFrom,
v.powerHpTo,
v.powerKwFrom,
v.powerKwTo,
v.typeName,
v.typeNumber,
v.valves,
v.yearOfConstrFrom,
v.yearOfConstrTo,
v.axisConfiguration,
v.tonnage,
v.brakeSystem
FROM
vehicleDetails AS v
left JOIN keyValues AS k ON v.fuelTypeKeyTableId = k.keyTableId AND v.fuelTypeKeyId = k.keyId and k.lang=@lang
left JOIN keyValues AS k2 ON v.constructionTypeKeyTableId = k2.keyTableId AND v.constructionTypeKeyId = k2.keyId and k2.lang=@lang
left JOIN keyValues AS k3 ON v.fuelTypeProcessKeyTableId = k3.keyTableId AND v.fuelTypeProcessKeyId = k3.keyId and k3.lang=@lang
left JOIN keyValues AS k4 ON v.motorTypeKeyTableId = k4.keyTableId AND v.motorTypeKeyId = k4.keyId and k4.lang=@lang
left JOIN keyValues AS k5 ON v.impulsionTypeKeyId = k5.keyId AND v.impulsionTypeKeyTableId = k5.keyTableId and k5.lang=@lang
where v.carId='XX'
group by v.carId
----------------------------------------------------------------------------------------------------------------
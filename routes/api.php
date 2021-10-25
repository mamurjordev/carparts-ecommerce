<?php

use App\Http\Controllers\AccountSettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\NewslettersController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\SettingController;
use App\Models\AccountSetting;
use App\Models\Newsletters;
use phpDocumentor\Reflection\Element;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Relational Search
Route::prefix('v1')->group(function () {
    Route::get('/brands', function () {
        return DB::table('manufacturers')->where('manuName', 'NOT LIKE', '%motorcycle%')
            ->select('manuId', 'manuName as name')->distinct()->orderBy('manuName')->get();
    });
    Route::get('/models/{manuId}', [SearchController::class, 'models']);
    Route::get('/vehicle-details/{manuId}/{modId}', [SearchController::class, 'vehicleDetails']);
    Route::get('/search/{search}', [SearchController::class, 'search']);
    Route::get('/subcategory/{section_id}', [ApiController::class, 'subcategory']);
    // Elements
    Route::get('/front/elements/siteheader', [ElementController::class, 'frontSiteHeader']);
    Route::get('/front/elements/sitefooter', [ElementController::class, 'frontSiteFooter']);
    // Payment
    Route::post('/transaction', [PaymentController::class, 'checkout']);
    // Newsletters
    Route::post('/newsletter/add', [NewslettersController::class, 'store']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('me/info', [AccountSettingController::class, 'show']);
    });

    // setting
    Route::get('/setting/site_setting', [SettingController::class, 'site_setting']);
    Route::post('/setting/site_setting', [SettingController::class, 'updateSiteSetting']);
    Route::get('/setting/socials', [SettingController::class, 'socials']);
    Route::post('/setting/socials', [SettingController::class, 'updateSocials']);

    Route::get('/setting/information', [SettingController::class, 'information']);
    Route::post('/setting/information', [SettingController::class, 'updateInformation']);

    Route::get('/setting/bank-account', [SettingController::class, 'BankAccount']);
    Route::post('/setting/bank-account', [SettingController::class, 'updateBankAccount']);

    Route::get('/setting/invoice', [SettingController::class, 'Invoice']);
    Route::post('/setting/invoice', [SettingController::class, 'updateInvoice']);

    Route::get('/setting/seo', [SeoController::class, 'index']);
    Route::post('/setting/seo', [SeoController::class, 'update']);

    // elements
    Route::get('/pages', [PageController::class, 'allPublished']);
    Route::get('/elements/sitefooter', [ElementController::class, 'siteFooter']);
    Route::post('/elements/sitefooter', [ElementController::class, 'updateSiteFooter']);
});

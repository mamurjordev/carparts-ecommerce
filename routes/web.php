<?php

use App\Models\User;
use Inertia\Inertia;
use App\Models\Newsletters;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\Sitemap;
use Illuminate\Support\Facades\DB;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DevSupportController;
use App\Http\Controllers\NewslettersController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VinController;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'Home']);

Route::get('/single-product', function () {
    return Inertia::render('SingleProduct');
});

// Category
Route::get('/categories/{carId}', [CategoryController::class, 'show']);
Route::get('/car/{car_id}/subcategories/{category_id}', [CategoryController::class, 'subCategories']);
// Route::get('/reifen', [CategoryController::class, 'reifen']);

// Product
Route::get('/products', [ProductController::class, 'products']);

// Vehicle
Route::get('/brands', function () {
    $brands = DB::table('manufacturers')
        ->where('linkingTargetType', 'p')
        ->where('manuName', 'NOT LIKE', '%MOTORCYCLE%')
        ->distinct()
        ->get();
    return Inertia::render('Brands', [
        'brands' => $brands
    ]);
});
Route::get('/brands/{brand}', function ($brand) {
    $models = DB::table('modelSeries')->where('manuId', $brand)
        ->select('modelId', 'modelname', 'yearOfConstrFrom', 'yearOfConstrTo')
        ->distinct()
        ->orderBy('modelname')->get();
    return Inertia::render('Models', [
        'models' => $models,
        'brand' => DB::table('manufacturers')->where('manuId', $brand)->select('manuId', 'manuName')->first()
    ]);
});

// Cart
Route::get('/cart', function () {
    return Inertia::render('Cart');
});

Route::get('/checkout', function () {
    return Inertia::render('CheckOut');
});

Route::get('/payment/success', function () {
    return Inertia::render('orderSuccess');
});

Route::get('/payment/cancel', function () {
    return Inertia::render('payment/orderCancel');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/Profile/Dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


// User
Route::get('/logout', [UserController::class, 'logout']);

Route::get('check', [VinController::class, 'check']);

// Profile
Route::middleware('auth')->prefix('profile')->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Profile/Dashboard');
    });
});



// Others
Route::get('/about-us', function () {
    Inertia::render('AboutUs');
});
Route::get('/page/{slug}', [PageController::class, 'show']);

// ADMIN

Route::middleware('auth.admin')->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Dashboard');
    });
    Route::get('/orders', function () {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Order/List', [
            'orders' => DB::table('orders')->orderBy('created_at')->paginate(20)
        ]);
    })->name('orders');
    Route::get('/users', function () {
        Inertia::setRootView('admin');
        return Inertia::render('admin/customer/List', [
            'users' => User::with('roles')->orderBy('name')->paginate('20')
        ]);
    })->name('users');
    Route::get('/products', function () {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Product/list');
    })->name('products');
    Route::get('/settings/site-header', [SettingController::class, 'getSiteHeader']);
    Route::post('/settings/site-header', [SettingController::class, 'updateSiteHeader']);

    Route::resource('category', App\Http\Controllers\admin\CategoryController::class);
    // Newsletters
    Route::get('/newsletter', [NewslettersController::class, 'index']);
    Route::delete('/newsletter/{newsletters}/delete', [NewslettersController::class, 'destroy']);
    Route::get('/sendmail/newsletter', [NewslettersController::class, 'create']);

    Route::prefix('/elements')->group(function () {
        Route::get('/', [ElementController::class, 'index']);
    });
    Route::get('/statistics', [App\Http\Controllers\admin\StatisticsController::class, 'index']);
    Route::resource('/pages', App\Http\Controllers\admin\PageController::class);

    // Settings
    Route::get('/settings', function () {
        Inertia::setRootView('admin');
        return Inertia::render('admin/Setting/List');
    })->name('settings');
    Route::get('/setting/seo', [SeoController::class, 'index'])->name('setting.seo');
    Route::post('/setting/seo', [SeoController::class, 'updateSeo'])->name('setting.seo.update');

    // Support
    Route::get('/dev/support', [DevSupportController::class, 'index']);

    // Vehicles
    Route::resource('/vehicles', VehicleController::class);
});
Route::get('/admin/login', function () {
    Inertia::setRootView('admin');
    return Inertia::render('admin/Login.vue');
});
Route::post('/admin/login', [\App\Http\Controllers\admin\AuthController::class, 'login']);

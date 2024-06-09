<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home'); 
})->name('home');

Route::get('loginPage', [DashboardController::class, 'loginPage'])->name('loginPage');
Route::post('login', [DashboardController::class, 'login'])->name('login');
Route::get('logout', [DashboardController::class, 'logout'])->name('logout');

// main site
Route::get('coupon/{id}', [CouponController::class, 'coupon'])->name('coupon');

Route::middleware(['auth'])->group(function () {

    // dashboard
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');
    Route::get('showAdminCoupon/{company_id}', [DashboardController::class, 'showAdminCoupon'])->name('showAdminCoupon')->middleware('auth');

    // countries
    Route::get('countries', [CountryController::class, 'countries'])->name('countries');
    Route::get('showCountry/{id}', [CountryController::class, 'showCountry'])->name('showCountry');

    // companies
    Route::get('companies', [CompanyController::class, 'companies'])->name('companies');
    Route::get('showCompany/{id}', [CompanyController::class, 'showCompany'])->name('showCompany');
    Route::get('addCompany', [CompanyController::class, 'addCompany'])->name('addCompany');
    Route::post('storeCompany', [CompanyController::class, 'storeCompany'])->name('storeCompany');

    // coupons
    Route::get('coupons', [CouponController::class, 'coupons'])->name('coupons');
    Route::get('addCoupon', [CouponController::class, 'addCoupon'])->name('addCoupon');
    Route::post('storeCoupon', [CouponController::class, 'storeCoupon'])->name('storeCoupon');
    Route::get('showCoupon/{id}', [CouponController::class, 'showCoupon'])->name('showCoupon');
    Route::put('updateCoupon/{id}', [CouponController::class, 'updateCoupon'])->name('updateCoupon');
    Route::get('deleteCoupon/{id}', [CouponController::class, 'deleteCoupon'])->name('deleteCoupon');
    Route::get('changeStatus/{id}', [CouponController::class, 'changeStatus'])->name('changeStatus');

});

<?php
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ReportController::class,'today']);




Route::get('/customer',[CustomerController::class,'index']);
Route::post('/customer',[CustomerController::class,'store']);

Route::get('/delivery',[DeliveryController::class,'index']);
Route::post('/delivery/{order}',[DeliveryController::class,'close']);

Route::get('/today',[ReportController::class,'today']);
Route::get('/orders',[ReportController::class,'orders']);

//vendor
Route::get('/vendor/login', [VendorController::class, 'showLogin'])
    ->name('vendor.login');
Route::post('/vendor/login', [VendorController::class, 'login']);

Route::middleware('vendor.auth')->group(function () {

    Route::get('/vendor', [VendorController::class, 'index']);
    Route::post('/vendor', [VendorController::class, 'store']);
Route::post('/vendor/logout', [VendorController::class, 'logout'])
    ->name('vendor.logout');
});


Route::get('/get-customer-by-phone', [ReportController::class, 'getCustomerByPhone']);


Route::get('/today-fish-vendors', [ReportController::class, 'getTodayFishVendorList']);

Route::post('/vendor/today-chart', [VendorController::class, 'todayChart'])
    ->name('vendor.today.chart');
Route::post('/orders/store', [ReportController::class, 'store'])->name('orders.store');

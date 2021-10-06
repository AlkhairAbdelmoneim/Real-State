<?php

use Illuminate\Support\Facades\Route;
use App\Models\SiteSetting;

define('PAGINATION_COUNT' , 6);
define('PAGINATION_COUNTBU' , 3);

Route::group(['prefix' => 'adminbanel' , 'middleware' => ['web','admin']] ,function(){

    route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('adminbanel');

    route::resource('users', App\Http\Controllers\Admin\UserController::class)->except(['show']);
    route::get('changeStatus/{id}', [App\Http\Controllers\Admin\UserController::class , 'changeStatus'])->name('changeStatus');

    route::resource('settings', App\Http\Controllers\Admin\SiteSettingController::class)->except(['show']);

    route::resource('building', App\Http\Controllers\Admin\BuildingController::class)->except(['show']);
    route::get('building/{id?}', [App\Http\Controllers\Admin\BuildingController::class , 'index'])->name('building');

    route::resource('contact_us', App\Http\Controllers\Admin\ContactController::class)->except(['show']);

    route::get('showYear', [App\Http\Controllers\Admin\AdminController::class, 'showYear'])->name('showYear');


});


// Route::get('/', function () {

//     Auth::routes();

//     return redirect()->route('welcome');
// });

Route::get('/', [App\Http\Controllers\Admin\BuAllController::class, 'welcome'])->name('welcome');

Route::get('showAllBuilding', [App\Http\Controllers\Admin\BuAllController::class, 'showAllEnable'])->name('showAllBuilding');
Route::get('about-us', [App\Http\Controllers\Admin\BuAllController::class, 'aboutUs'])->name('about-us');
Route::get('forRent', [App\Http\Controllers\Admin\BuAllController::class, 'forRent'])->name('forRent');
Route::get('byRent', [App\Http\Controllers\Admin\BuAllController::class, 'byRent'])->name('byRent');
Route::get('type/{type}' , [App\Http\Controllers\Admin\BuAllController::class, 'showType'])->name('type');
Route::get('search', [App\Http\Controllers\Admin\BuAllController::class, 'search'])->name('search');
Route::get('singleBuilding/{id}', [App\Http\Controllers\Admin\BuAllController::class, 'singleBuilding'])->name('singleBuilding');
Route::get('ajax/bu/info', [App\Http\Controllers\Admin\BuAllController::class, 'getAjaxInfo']);

// Route::post('getbuInfo', [App\Http\Controllers\Admin\ContactController::class, 'getbuInfo']);
Route::get('contact', [App\Http\Controllers\Admin\ContactController::class, 'sendMessage'])->name('contact');
Route::post('store', [App\Http\Controllers\Admin\ContactController::class, 'store'])->name('store');

Route::middleware('auth')->group(function () {

    Route::get('userbucreate', [App\Http\Controllers\Admin\userAddBuController::class, 'create'])->name('userbucreate');
    Route::post('userbuStore', [App\Http\Controllers\Admin\userAddBuController::class, 'store'])->name('userbuStore');
    Route::get('userbuedit/{id}', [App\Http\Controllers\Admin\userAddBuController::class, 'edit'])->name('userbuedit');
    Route::post('userbuUpdate/{id}', [App\Http\Controllers\Admin\userAddBuController::class, 'update'])->name('userbuUpdate');


    Route::get('showuserbu', [App\Http\Controllers\Admin\userAddBuController::class, 'ShowbuActive'])->name('showuserbu');
    Route::get('ShowbuNotActive', [App\Http\Controllers\Admin\userAddBuController::class, 'ShowbuNotActive'])->name('ShowbuNotActive');
    Route::get('UserEditInfo', [App\Http\Controllers\Admin\userAddBuController::class, 'editUserInfo'])->name('UserEditInfo');
    Route::post('updateUserInfo', [App\Http\Controllers\Admin\userAddBuController::class, 'updateUserInfo'])->name('updateUserInfo');

});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

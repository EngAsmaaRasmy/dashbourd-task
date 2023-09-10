<?php

use App\Http\Controllers\admin\AdminController;

use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect']], function () {

    Route::group(["prefix" => ""], function () {
        Route::get("/", [AdminController::class, "showAdminLoginForm"])->name("get-admin-login");

        Route::post("/", [AdminController::class, "adminLogin"])->name("admin.login");
        Route::group(["middleware" => "auth:admin"], function () {
            Route::get("/home", [AdminController::class, "showHome"])->name("admin.home");
            Route::get("/logout", [AdminController::class, "logout"])->name("admin.logout");
            Route::resources([
                'categories' => CategoryController::class,
                'products' => ProductController::class,
                'admins' => AdminController::class,
            ]);
        });
    });
});

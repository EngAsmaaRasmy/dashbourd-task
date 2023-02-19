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


Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]], function () {

    Route::group(["prefix" => ""], function () {
        Route::get("/", [AdminController::class, "showAdminLoginForm"])->name("get-admin-login");
        
        Route::post("/", [AdminController::class, "adminLogin"])->name("admin.login");
        Route::group(["middleware" => "auth:admin"], function () {
          Route::get("/home", [AdminController::class, "showHome"])->name("admin.home");
          Route::get("/logout", [AdminController::class, "logout"])->name("admin.logout");

          Route::group(["prefix" => "/categories"], function () {
            Route::get("/index", [CategoryController::class, "index"])->name("categories.index");
            Route::get("/add", [CategoryController::class, "create"])->name("categories.create");
            Route::post("/add", [CategoryController::class, "store"])->name("categories.store");
            Route::get("/edit/{id}", [CategoryController::class, "edit"])->name("categories.edit");
            Route::post("/update/{id}", [CategoryController::class, "update"])->name("categories.update");
            Route::post("/delete", [CategoryController::class, "destroy"])->name("categories.delete");
          });


          Route::group(["prefix" => "/products"], function () {
            Route::get("/index", [ProductController::class, "index"])->name("products.index");
            Route::get("/add", [ProductController::class, "create"])->name("products.create");
            Route::post("/add", [ProductController::class, "store"])->name("products.store");
            Route::get("/edit/{id}", [ProductController::class, "edit"])->name("products.edit");
            Route::post("/update/{id}", [ProductController::class, "update"])->name("products.update");
            Route::post("/delete", [ProductController::class, "delete"])->name("products.delete");
          });
    
          Route::group(["prefix" => "admins"], function () {
              Route::get("/add", [AdminController::class, "create"])->name("get.add.admin");
              Route::post("/add", [AdminController::class, "store"])->name("admin.save");
              Route::get("/index", [AdminController::class, "index"])->name("admins.index");
              Route::get("/edit/{id}", [AdminController::class, "edit"])->name("admin.edit");
              Route::post("/update/{id}", [AdminController::class, "update"])->name("admin.update");
              Route::post("/delete", [AdminController::class, "destroy"])->name("admin.delete");
          });

          
        });
    });
}); 


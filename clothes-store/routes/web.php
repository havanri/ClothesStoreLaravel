<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaxonomyAttributeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
    Route::get('/admin',[AdminController::class,'home'])->name('home');

    Route::get('/admin/login',[AccountController::class,'login'])->name('account.login');
    Route::post('/admin/login',[AccountController::class,'postLogin']);
    Route::get('/admin/register',[AccountController::class,'register'])->name('account.register');
    Route::post('/admin/register',[AccountController::class,'postRegister']);
    Route::get('/admin/logout',[AccountController::class,'logout'])->name('account.logout');
Route::prefix('admin')->group(function () {
    Route::prefix('cat')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->middleware('can:list-category')->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->middleware('can:add-category')->name('category.create');
        Route::post('/create', [CategoryController::class, 'store']);
        Route::get('/{id}', [CategoryController::class, 'show']);
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->middleware('can:edit-category')->name('category.edit');
        Route::put('/edit/{id}', [CategoryController::class, 'update']);
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->middleware('can:remove-category')->name('category.destroy');
    });
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/create', [UserController::class, 'store']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/edit/{id}', [UserController::class, 'update']);
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
    Route::prefix('role')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('role.index');
        Route::get('/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('/create', [RoleController::class, 'store']);
        Route::get('/{id}', [RoleController::class, 'show']);
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::put('/edit/{id}', [RoleController::class, 'update']);
        Route::get('/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
    });
    Route::prefix('permission')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
        Route::get('/create', [PermissionController::class, 'create'])->name('permission.create');
        Route::post('/create', [PermissionController::class, 'store']);
        Route::get('/{id}', [PermissionController::class, 'show']);
        Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::put('/edit/{id}', [PermissionController::class, 'update']);
        Route::get('/delete/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    });
    Route::prefix('pro')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/create', [ProductController::class, 'store']);
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/edit/{id}', [ProductController::class, 'update']);
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::get('/opt/{attributeId}', [ProductController::class, 'OptionTaxonomies'])->name('product.opt');
    });
    Route::prefix('tag')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('tag.index');
        Route::get('/create', [TagController::class, 'create'])->name('tag.create');
        Route::post('/create', [TagController::class, 'store']);
        Route::get('/{id}', [TagController::class, 'show']);
        Route::get('/edit/{id}', [TagController::class, 'edit'])->name('tag.edit');
        Route::put('/edit/{id}', [TagController::class, 'update']);
        Route::get('/delete/{id}', [TagController::class, 'destroy'])->name('tag.destroy');
        Route::get('/opt/{attributeId}', [TagController::class, 'OptionTaxonomies'])->name('tag.opt');
    });
    Route::prefix('attr')->group(function () {
        Route::get('/', [ProductAttributeController::class, 'index'])->name('attribute.index');
        Route::get('/create', [ProductAttributeController::class, 'create'])->name('attribute.create');
        Route::post('/create', [ProductAttributeController::class, 'store']);
        Route::get('/{id}', [ProductAttributeController::class, 'show']);
        Route::get('/edit/{id}', [ProductAttributeController::class, 'edit'])->name('attribute.edit');
        Route::put('/edit/{id}', [ProductAttributeController::class, 'update']);
        Route::get('/delete/{id}', [ProductAttributeController::class, 'destroy'])->name('attribute.destroy');
    });
    Route::prefix('taxonomy')->group(function () {
        Route::get('/{attributeId}', [TaxonomyAttributeController::class, 'index'])->name('taxonomyattribute.index');
        Route::get('/create/{attributeId}', [TaxonomyAttributeController::class, 'create'])->name('taxonomyattribute.create');
        Route::post('/create', [TaxonomyAttributeController::class, 'store'])->name('taxonomyattribute.store');
        Route::get('/{id}', [TaxonomyAttributeController::class, 'show']);
        Route::get('/edit/{id}', [TaxonomyAttributeController::class, 'edit'])->name('taxonomyattribute.edit');
        Route::put('/edit/{id}', [TaxonomyAttributeController::class, 'update']);
        Route::get('/delete/{id}', [TaxonomyAttributeController::class, 'destroy'])->name('taxonomyattribute.destroy');
    });
    Route::prefix('slider')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('slider.index');
        Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
        Route::post('/create', [SliderController::class, 'store']);
        Route::get('/{id}', [SliderController::class, 'show']);
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::put('/edit/{id}', [SliderController::class, 'update']);
        Route::get('/delete/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    });
    Route::prefix('link')->group(function () {
        Route::get('/', [LinkController::class, 'index'])->name('link.index');
        Route::get('/create', [LinkController::class, 'create'])->name('link.create');
        Route::post('/create', [LinkController::class, 'store']);
        Route::get('/{id}', [LinkController::class, 'show']);
        Route::get('/edit/{id}', [LinkController::class, 'edit'])->name('link.edit');
        Route::put('/edit/{id}', [LinkController::class, 'update']);
        Route::get('/delete/{id}', [LinkController::class, 'destroy'])->name('link.destroy');
    });
    Route::prefix('menu')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('menu.index');
        Route::get('/create', [MenuController::class, 'create'])->name('menu.create');
        Route::post('/create', [MenuController::class, 'store']);
        Route::get('/{id}', [MenuController::class, 'show']);
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::put('/edit/{id}', [MenuController::class, 'update']);
        Route::get('/delete/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
    });
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
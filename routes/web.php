<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
    return view('frontend.index');
});
Route::get('/2', function () {
    return view('frontend.index2');
});
Route::get('/about', function () {
    return view('frontend.pages.about-us');
});
Route::get('/career', function () {
    return view('frontend.pages.career');
});
Route::get('/contacts', function () {
    return view('frontend.pages.contacts');
});
Route::get('/media', function () {
    return view('frontend.pages.media');
});


Route::get('user-show',  [AuthController::class, 'show'])->name('user-show');
Route::middleware('loggedin')->group(function () {
    Route::post('user-login',  [AuthController::class, 'login'])->name('user-login');
    Route::post('user-signup',  [AuthController::class, 'register'])->name('user-signup');
    Route::get('login',  [AuthController::class, 'loginView'])->name('login-view');
    Route::get('login',  [AuthController::class, 'loginView'])->name('login-view');
    Route::post('loginAuth',  [AuthController::class, 'login'])->name('login');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function() {
Route::get('admin', [PageController::class,'loadPage'])->name('dashboard');
Route::get('logout',  [AuthController::class, 'logout'])->name('logout');


Route::get('/categorys/addCategorys', [CategoryController::class,'creates'])->name('Categorys');
Route::post('/categorys/storeCategorys', [CategoryController::class,'stores'])->name('stores');
Route::get('/categorys/showCategorys', [CategoryController::class,'index'])->name('shows');
Route::get('/categorys/showCategorys/delete/{id}', [CategoryController::class,'destroys'])->name('destroys');
Route::get('/categorys/showCategorys/edit/{id}', [CategoryController::class,'edit'])->name('Edit');
Route::post('/categorys/showCategorys/updates', [CategoryController::class,'updates'])->name('updates');
Route::get('/changecat', [CategoryController::class,'changeajaxx'])->name('changeajaxx');


Route::get('/product/addProduct', [ProductController::class, 'Add'])->name('add');
Route::post('/product/storeProduct', [ProductController::class, 'stored'])->name('stored');
Route::get('/product/showProduct', [ProductController::class, 'display'])->name('display');
Route::get('/product/showProduct/delete/{id}', [ProductController::class, 'remove'])->name('remove');
Route::get('/product/showProduct/edit/{id}', [ProductController::class, 'change'])->name('change');
Route::post('/product/showProduct/updating', [ProductController::class, 'updating'])->name('updating');
});
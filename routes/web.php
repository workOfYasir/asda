<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CarrerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/2', function () {
    return view('frontend.index2');
});
Route::get('/about', function () {
    return view('frontend.pages.about-us');
});
Route::get('/career', [CarrerController::class, 'show'])->name('career');
Route::get('/contacts',  [ContactController::class,'show'])->name('contacts');
Route::get('/media', function () {
    return view('frontend.pages.media');
});
Route::get('/project/detail', [ProductController::class, 'detail'])->name('project.detail');
Route::get('/projects', [ProductController::class, 'show'])->name('projects');
Route::post('/applied_job', [CarrerController::class, 'applied_job'])->name('applied_job');

Route::post('/contact_us', [ContactController::class, 'contact'])->name('contact_us');

Route::get('/cmd', function () {

    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";

    $cleardebugbar = Artisan::call('debugbar:clear');
    echo "Debug Bar cleared<br>";

});
Route::get('/categorys/categoryProducts/{cat_name}', [ProductController::class,'categoryProducts'])->name('categoryProducts');
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
Route::post('/product/storeProductImages', [ProductController::class, 'storedImage'])->name('storedImage');
Route::get('/product/showProduct', [ProductController::class, 'display'])->name('display');
Route::get('/product/showProduct/delete/{id}', [ProductController::class, 'remove'])->name('remove');
Route::get('/product/showProduct/edit/{id}', [ProductController::class, 'change'])->name('change');
Route::post('/product/showProduct/updating', [ProductController::class, 'updating'])->name('updating');

Route::get('/addJob', function () {
    return view('backend.carrer.addJob');
})->name('addJob');
Route::post('/carrer/storeJob', [CarrerController::class, 'jobStore'])->name('job-store');
});
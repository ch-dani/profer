<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backendControllers\CategoryController;
use App\Http\Controllers\backendControllers\ProductController;
use App\Http\Controllers\backendControllers\DashboardController;
use App\Http\Controllers\frontendControllers\WebsiteController;
use App\Http\Controllers\backendControllers\GroupController;
use App\Http\Controllers\backendControllers\UserController;

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

Route::get('/',[WebsiteController::class,'index'])->name('landingpage');
Route::get('/home',[WebsiteController::class,'index'])->name('home');
Route::get('shop/{id?}',[WebsiteController::class,'shop'])->name('shop');
Route::get('add-to-cart',[WebsiteController::class,'add_to_cart'])->name('addToCart');
Route::get('cart',[WebsiteController::class,'cart'])->name('show_cart');
Route::get('get-all-products',[WebsiteController::class,'get_cart'])->name('get_all_products');
Route::get('change-quantity',[WebsiteController::class,'change_quantity'])->name('change_quantity');
Route::get('del-cartItem',[WebsiteController::class,'del_cart_item'])->name('del_cart_item');
Route::get('checkout',[WebsiteController::class,'checkout'])->name('checkout');

Route::post('save-user',[WebsiteController::class,'register'])->name('save.user');


Route::group(['prefix'=>'admin','middleware'=>'superadmin'],function(){
	Route::get('dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
	Route::get('main-menu',[CategoryController::class,'main_menu'])->name('admin.main_menu');
	Route::post('save-main-menu',[CategoryController::class,'save_mainMenu'])->name('save.mainMenu');



	Route::get('brands',[CategoryController::class,'brands'])->name('brands.index');
	Route::post('save-brand',[CategoryController::class,'brand_save'])->name('save.brand');



    Route::get('sub-brands',[CategoryController::class,'sub_brands'])->name('subbrands.index');
	Route::post('save-subbrand',[CategoryController::class,'sub_brand_save'])->name('save.subbrand');

    Route::get('sub',[CategoryController::class,'get_sub_brand'])->name('allsubs');


    Route::get('models',[CategoryController::class,'index_models'])->name('index.models');
    Route::get('allsubbrands',[CategoryController::class,'allsubbrands'])->name('allsubbrands');


    Route::post('save-model',[CategoryController::class,'add_model'])->name('save.model');


    // product routest

    Route::get('/products',[ProductController::class,'create'])->name('index.product');
    Route::post('/save-product',[ProductController::class,'store'])->name('products.store');

    // get hiererchies and children
    Route::get('/get-sub-categories',[CategoryController::class,'get_subs'])->name('get_sub');
    Route::get('/get-brands',[CategoryController::class,'get_brands'])->name('get_brands');
    Route::get('/get-subbrands',[CategoryController::class,'get_subbrands'])->name('get_subbrands');
    Route::get('/get-models',[CategoryController::class,'get_models '])->name('get_models');
    

    // group routest

    Route::get('groups' ,[GroupController::class,'index'])->name('groups.index');
    Route::post('groups-store' ,[GroupController::class,'store'])->name('groups.store');

    // user routes

    Route::get('users',[UserController::class,'index'])->name('user.index');
    Route::post('assign-group-to-user',[UserController::class,'assignGroupToUser'])->name('assignGroupToUser');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

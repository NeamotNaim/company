<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!



46. admin panel overview
47. admin panel mastering form backend theme separate navbar, sidebar, footer
48. admin panel mastering by separate navbar, sidebar, footer
49. set logout option in navbar
50. login, registration page setup as like theme
51. frontend theme setup
52.frontend theme setup
53. brand controller setup
54. slider controller , model, database, view page setup
55.create slider part as homecontroller view create
56. make slider dynamic in home , add slider as query builder and active class modify 
57. make about us section dynamic (get database , migrate and show data from database)
58. create about page to insert data from admin
59. about page update,edit,delete
60. about page update,edit,delete
61. home page about section data from database (dynamic data)
62. make portfolio database,admin panel create,edit,update portfolio
63. make home page portfolio section dynamic
64-68. contact profile location, email, call setup with database,migration
69. change admin user password and update profile name,email,photo


|
*/

Route::get('/', function () {
    $brands=DB::table('brands')->get();
    $abouts=DB::table('home_abouts')->first();
    $portfolio=DB::table('multi_pics')->get();

    return view('home',compact('brands','abouts','portfolio'));
});

Route::get('/dashboard', function () {
    return view('admin/index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/logout',function (){
    Auth::logout();
    // toastr()->success('Success Message');
    return Redirect()->route('login')->with('message','Logout Successfully');
})->name('user.logout');


//11/12/13 Brands Controller eloquent orm, image upload,resize     video 34-39
Route::get('brand/all', [BrandController::class, 'index'])->name('allbrand');
Route::post('brand/add/store', [BrandController::class, 'storeBrand'])->name('store.brand');
Route::get('brand/edit/{id}', [BrandController::class, 'edit']);
Route::post('brand/update/{id}', [BrandController::class, 'update']);



//Home slider route  video 54-56
Route::get('slider/all', [HomeController::class, 'index'])->name('allslider');
Route::get('slider/add', [HomeController::class, 'add'])->name('add.slider');
Route::post('slider/add/store', [HomeController::class, 'storeSlider'])->name('store.slider');
Route::get('slider/edit/{id}', [HomeController::class, 'edit']);
Route::post('slider/update/{id}', [HomeController::class, 'update']);
Route::get('slider/delete/{id}', [HomeController::class, 'delete']);

//Home about route   video 57-61
Route::get('about/all', [AboutController::class, 'index'])->name('allabout');
Route::get('about/add', [AboutController::class, 'add'])->name('add.about');
Route::post('about/add/store', [AboutController::class, 'storeAbout'])->name('store.about');
Route::get('about/edit/{id}', [AboutController::class, 'edit']);
Route::post('about/update/{id}',[AboutController::class,'AboutUpdate']);
Route::get('about/delete/{id}', [AboutController::class, 'delete']);

//Portfolio Controller    video 62-63
Route::get('portfolio/all',[PortfolioController::class,'index'])->name('allportfolio');
Route::get('portfolio/add', [PortfolioController::class, 'add'])->name('add.portfolio');
Route::post('portfolio/add/store', [PortfolioController::class, 'storePortfolio'])->name('store.portfolio');
Route::get('portfolio/edit/{id}', [PortfolioController::class, 'edit']);
Route::post('portfolio/update/{id}',[PortfolioController::class,'PortfolioUpdate']);
Route::get('portfolio/delete/{id}', [PortfolioController::class, 'delete']);


//Contact Admin Route    video 62-63
Route::get('contact/all',[ContactController::class,'index'])->name('allcontact');
Route::get('contact/add', [ContactController::class, 'add'])->name('add.contact');
Route::post('contact/add/store', [ContactController::class, 'storeContact'])->name('store.contact');
Route::get('contact/edit/{id}', [ContactController::class, 'edit']);
Route::post('contact/update/{id}',[ContactController::class,'ContactUpdate']);
Route::get('contact/delete/{id}', [ContactController::class, 'delete']);
Route::get('contact/message/all',[ContactController::class,'message'])->name('allmessage');
Route::get('contact/message/view/{id}', [ContactController::class, 'view']);
Route::get('contact/message/delete/{id}', [ContactController::class, 'deleteMessage']);
//Contact Home page Route
Route::get('/contact',[ContactController::class,'contact'])->name('contact');
Route::post('contact/message/sent', [ContactController::class, 'storeMessage'])->name('message.store');


//Admin Profile and Password Change
Route::get('admin/password/change',[AdminController::class,'passChange'])->name('password.change');
Route::post('admin/password/save', [AdminController::class, 'passSave'])->name('password.save');
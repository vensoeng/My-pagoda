<?php

use App\Http\Controllers\ArticalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\MonkController;
use App\Http\Controllers\MonkphotoController;
use App\Http\Controllers\PhotocardController;
use App\Http\Controllers\userController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VideocreatorController;
use App\Http\Controllers\CustomizationController;
use App\Http\Controllers\adminController;

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
// this Is home page
Route::get('/', [homeController::class, 'index'])->name('homepage');
// this is user routing ===================>

Route::get('/login', [AuthController::class, 'index'])->name('home.login');
Route::post('/login/auth', [AuthController::class, 'authenticate'])->name('home.login.auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/new', [homeController::class, 'new'])->name('home.new');
Route::get('/monk', [homeController::class, 'monk'])->name('home.monk');
Route::get('/festival', [homeController::class, 'festival'])->name('home.festival');
Route::get('/video', [homeController::class, 'video'])->name('home.video');
Route::get('/build', [homeController::class, 'build'])->name('home.build');
Route::get('/development', [homeController::class, 'development'])->name('home.development');
Route::get('/aspect', [homeController::class, 'aspect'])->name('home.aspect');
Route::get('/help', [homeController::class, 'help'])->name('home.help');
Route::get('/about', [homeController::class, 'about'])->name('home.about');
Route::get('/home/monkuser/{user}/show', [homeController::class, 'monkuser'])->name('home.monkuser');
// this is other user rout ======================>
Route::get('/allbook', [homeController::class, 'allbook'])->name('home.allbook');
Route::get('/allartical', [homeController::class, 'allartical'])->name('home.allartical');
Route::get('/allartical/{item}/show', [homeController::class, 'checkArtical'])->name('home.checkArtical');
//this is rout for admin==========================>
Route::group(['middleware' => 'admin'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    // this is dashboard rout
    Route::get('/admin/dashboard', [adminController::class, 'index'])->name('admin.dashboard');
    // this is rout monk
    Route::get('/admin/monk', [MonkController::class, 'index'])->name('admin.monk');
    Route::post('/admin/monk/monk/add', [MonkController::class, 'store'])->name('admin.monk.store');
    Route::get('/admin/monk/{monk}/edit', [MonkController::class, 'edit'])->name('admin.monk.edit');
    Route::put('/admin/monk/{monk}/update', [MonkController::class, 'update'])->name('admin.monk.update');
    // this is artical rout
    Route::get('/admin/artical', [ArticalController::class, 'index'])->name('admin.artical');
    Route::post('/admin/artical/store', [ArticalController::class, 'store'])->name('admin.artical.store');
    Route::get('/admin/artical/{artical}/edit', [ArticalController::class, 'edit'])->name('admin.artical.edit');
    Route::put('/admin/artical/{artical}/update', [ArticalController::class, 'update'])->name('admin.artical.update');
    Route::delete('/admin/artical/{artical}/delete', [ArticalController::class, 'destroy'])->name('admin.artical.delete');
    //this is rout book
    Route::get('/admin/book', [BookController::class, 'index'])->name('admin.book');
    Route::post('/admin/addbook', [BookController::class, 'store'])->name('admin.book.store');
    Route::get('/admin/book/{book}/edit', [BookController::class, 'edit'])->name('admin.book.edit');
    Route::put('/admin/book/{book}/update', [BookController::class, 'update'])->name('admin.book.update');
    Route::delete('/admin/book/{book}/delete', [BookController::class, 'destroy'])->name('admin.book.delte');
    // this is user creator vidoe is the sub video
    Route::post('/admin/videocreator/store', [VideocreatorController::class, 'store'])->name('admin.videocreator.store');
    Route::get('/admin/videocreator/{videocreator}/edit', [VideocreatorController::class, 'edit'])->name('admin.videocreator.edit');
    Route::put('/admin/videocreator/{videocreator}/update', [VideocreatorController::class, 'update'])->name('admin.videocreator.update');
    //this is short video
    Route::get('/admin/video', [VideoController::class, 'index'])->name('admin.video');
    Route::post('/admin/video/store', [VideoController::class, 'store'])->name('admin.video.store');
    Route::get('/admin/video/{video}/edit', [VideoController::class, 'edit'])->name('admin.video.edit');
    Route::put('/admin/video/{video}/update', [VideoController::class, 'update'])->name('admin.video.update');
    Route::delete('/admin/video/{video}/delete', [VideoController::class, 'destroy'])->name('admin.video.delete');
    Route::delete('/admin/video/{video}/error', [VideoController::class, 'delete'])->name('admin.video.error');
    // this is festival
    Route::get('/admin/festival', [FestivalController::class, 'index'])->name('admin.festival');
    Route::post('/admin/festival/store', [FestivalController::class, 'store'])->name('admin.festival.store');
    Route::get('/admin/festival/{festival}/edit', [FestivalController::class, 'edit'])->name('admin.festival.edit');
    Route::put('/admin/festival/{festival}/update', [FestivalController::class, 'update'])->name('admin.festival.update');
    Route::delete('/admin/festival/{festival}/delete', [FestivalController::class, 'destroy'])->name('admin.festival.delete');
    //this is route for customization for slider in home page
    Route::get('/admin/customization', [CustomizationController::class, 'index'])->name('admin.customization');
    Route::post('/admin/customization/store', [CustomizationController::class, 'store'])->name('admin.customization.store');
    Route::delete('/admin/customization/{customization}/store', [CustomizationController::class, 'destroy'])->name('admin.customization.delete');
    // =====================this is user ============ work =============>
    Route::get('/home/user', [userController::class, 'index'])->name('home.user');
});
Route::group(['middleware' => 'user'], function () {
    Route::get('/home/user', [userController::class, 'index'])->name('home.user');
    // this is for update infor mation of user
    Route::get('/home/user/{user}/edit', [userController::class, 'edit'])->name('home.user.edit');
    Route::put('/home/user/{user}/update', [userController::class, 'update'])->name('home.user.update');
    //this is for add card of user
    Route::post('/home/user/add/card', [PhotocardController::class, 'store'])->name('home.user.addcard');
    Route::delete('/home/user/delete/{photocard}/card', [PhotocardController::class, 'destroy'])->name('home.user.deletecard');
    // this is for add photo for user
    Route::post('/home/user/add/photo', [MonkphotoController::class, 'store'])->name('home.user.addphoto');
    Route::get('/home/user/{monkphoto}/edit/photo', [MonkphotoController::class, 'edit'])->name('home.user.editphoto');
    Route::put('/home/user/{monkphoto}/update/photo', [MonkphotoController::class, 'update'])->name('home.user.updatephoto');
    Route::delete('/home/user/{monkphoto}/delete/photo', [MonkphotoController::class, 'destroy'])->name('home.user.deletephoto');
    //this is for logout for user
});

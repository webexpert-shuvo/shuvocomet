<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    //Backend Login & Register & DashBord Routes
    Route::get('/admin-login' , [App\Http\Controllers\dashBordController::class,  'showLoginPage'])->name('showloginpage');
    Route::get('/admin-register' , [App\Http\Controllers\dashBordController::class,  'showRegisterPage'])->name('showregisterpage');

    Route::group(['middleware' => 'auth'] , function (){

        Route::get('/admin-panel' , [App\Http\Controllers\dashBordController::class,  'showAdminPanelPage'])->name('showadminpanelpage');
           //Route For Tags
        Route::get('/tag' , [App\Http\Controllers\TagController::class, 'Index'])->name('showtagpage');
        Route::post('/tag' , [App\Http\Controllers\TagController::class, 'Create'])->name('createtag');
        Route::get('/tag-all' , [App\Http\Controllers\TagController::class, 'tagAll'])->name('alltag');
        Route::get('/tag-active/{id}' , [App\Http\Controllers\TagController::class, 'tagStatus'])->name('tagstaus');
        Route::get('/tag-editdata/{id}' , [App\Http\Controllers\TagController::class, 'tagEditForm'])->name('edittagform');
        Route::post('/tag-editdata/{id}' , [App\Http\Controllers\TagController::class, 'tagUpdateForm'])->name('tagupdate');
        Route::get('/tag-delete/{id}' , [App\Http\Controllers\TagController::class, 'tagdelete'])->name('deletetag');

        //Route for Category
        Route::get('/category' , [App\Http\Controllers\CategoryController::class, 'index'])->name('showcategorypage');
        Route::post('/category' , [App\Http\Controllers\CategoryController::class, 'categoryStore'])->name('createcat');
        Route::get('/category-all' , [App\Http\Controllers\CategoryController::class, 'categoryAll'])->name('catall');
        Route::get('/category-status/{id}' , [App\Http\Controllers\CategoryController::class, 'categorystatus'])->name('catstatus');
        Route::get('/category-editformdata/{id}' , [App\Http\Controllers\CategoryController::class, 'editformdata'])->name('editformdata');
        Route::post('/category-formeditupdate/{id}' , [App\Http\Controllers\CategoryController::class, 'actformupdate'])->name('actformupdate');
        Route::get('/category-delete/{id}' , [App\Http\Controllers\CategoryController::class, 'deletecategory'])->name('deletecate');


    // Route For Post
        Route::get('/posts' , [App\Http\Controllers\PostController::class , 'index'])->name('showpostpage');
        Route::get('/post-create' , [App\Http\Controllers\PostController::class , 'craetepost'])->name('craetepost');
        Route::post('/post-create' , [App\Http\Controllers\PostController::class , 'postcreate'])->name('postcreate');
        Route::get('/post-edit/{id}' , [App\Http\Controllers\PostController::class , 'postedit'])->name('postedit');



    });





    //Comet Theme Route


    Route::get('/blog', [App\Http\Controllers\CometBlogController::class, 'index'])->name('showcometblog');

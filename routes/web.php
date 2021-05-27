<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEBAPP\Admin\AdminController;
use App\Http\Controllers\WEBAPP\Admin\ManageLoanerController;
use App\Http\Controllers\WEBAPP\Admin\ManageBorrowerController;
use App\Http\Controllers\WEBAPP\Loaners\LoanerController;
use App\Http\Controllers\WEBAPP\Borrowers\BorrowerController;
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

Route::get('/multi', function () {
    return view('multi');
});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//! ------------------------ Admin -------------------------------------------
Route::prefix('admin')->name('admin.')->group(function(){
  
    Route::middleware(['guest:admins','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::view('/register','dashboard.admin.register')->name('register');
          Route::post('/create',[AdminController::class,'create'])->name('create');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admins','PreventBackHistory'])->group(function(){
          Route::view('/home','dashboard.admin.home')->name('home');
          Route::post('/logout',[AdminController::class,'logout'])->name('logout');
          Route::get('/add-new',[AdminController::class,'add'])->name('add');
          Route::get('/loanermanage', [App\Http\Controllers\WEBAPP\Admin\ManageLoanerController::class, 'show'])->name('loanermanage');
          Route::get('/borrowermanage', [App\Http\Controllers\WEBAPP\Admin\ManageBorrowerController::class, 'show'])->name('borrowermanage');
          Route::get('/loanerview/view/{LoanerID}', [App\Http\Controllers\WEBAPP\Admin\ManageLoanerController::class, 'view'])->name('loanerview');
          Route::get('/loanerview/update1/{LoanerID}', [App\Http\Controllers\WEBAPP\Admin\ManageLoanerController::class, 'update1']);
          Route::get('/loanerview/update2/{LoanerID}', [App\Http\Controllers\WEBAPP\Admin\ManageLoanerController::class, 'update2']);
          Route::get('/borrowerview/view/{BorrowerID}', [App\Http\Controllers\WEBAPP\Admin\ManageBorrowerController::class, 'view'])->name('borrowerview');
          Route::get('/borrowerview/update1/{BorrowerID}', [App\Http\Controllers\WEBAPP\Admin\ManageBorrowerController::class, 'update1']);
          Route::get('/borrowerview/update2/{BorrowerID}', [App\Http\Controllers\WEBAPP\Admin\ManageBorrowerController::class, 'update2']);


          
    });

});

//! ------------------------ Loaner -------------------------------------------
Route::prefix('loaner')->name('loaner.')->group(function(){
       
   Route::middleware(['guest:loaner','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.loaner.login')->name('login');
          Route::view('/register','dashboard.loaner.register')->name('register');
          Route::post('/create',[LoanerController::class,'create'])->name('create');
          Route::post('/check',[LoanerController::class,'check'])->name('check');
    });

    Route::middleware(['auth:loaner','PreventBackHistory'])->group(function(){
          Route::view('/home','dashboard.loaner.home')->name('home');
          Route::post('/logout',[LoanerController::class,'logout'])->name('logout');
    });

 });


 //! ------------------------ Borrower -------------------------------------------
Route::prefix('borrower')->name('borrower.')->group(function(){

    Route::middleware(['guest:borrower','PreventBackHistory'])->group(function(){
            Route::view('/login','dashboard.borrower.login')->name('login');
            Route::view('/register','dashboard.borrower.register')->name('register');
            Route::post('/create',[BorrowerController::class,'create'])->name('create');
            Route::post('/check',[BorrowerController::class,'check'])->name('check');
        });

     Route::middleware(['auth:borrower','PreventBackHistory'])->group(function(){
            Route::view('/home','dashboard.borrower.home')->name('home');
            Route::post('logout',[BorrowerController::class,'logout'])->name('logout');
        });

 });
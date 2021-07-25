<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEBAPP\Admin\AdminController;
use App\Http\Controllers\WEBAPP\Admin\ManageLoanerController;
use App\Http\Controllers\WEBAPP\Admin\ManageBorrowerController;
use App\Http\Controllers\WEBAPP\Admin\ManageArticleController;
use App\Http\Controllers\WEBAPP\Loaners\LoanerController;
use App\Http\Controllers\WEBAPP\Loaners\BorrowlistController;
use App\Http\Controllers\WEBAPP\Borrowers\BorrowerController;
use App\Http\Controllers\WEBAPP\Borrowers\ListController;

//borrowers
use App\Http\Controllers\WEBAPP\Borrowers\BorrowerRequestController;
use App\Http\Controllers\WEBAPP\Borrowers\BorrowerBorrowDetailController;
use App\Http\Controllers\WEBAPP\Borrowers\ArticleController;

//loaner
use App\Http\Controllers\WEBAPP\Loaners\LoanerRequestController;
use App\Http\Controllers\WEBAPP\Loaners\LoanerBorrowDetailController;
use App\Http\Controllers\WEBAPP\Loaners\LoanerHistoryController;
use App\Http\Controllers\WEBAPP\Loaners\LoanerBankController;

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

Route::get('/cookie', function () {
    return view('cookie');
});




Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//! ------------------------ Admin -------------------------------------------
Route::prefix('admin')->name('admin.')->group(function(){
  
    Route::middleware(['guest:admins','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::view('/register','dashboard.admin.register')->name('register');
         // Route::post('/create',[AdminController::class,'create'])->name('create');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admins','PreventBackHistory'])->group(function(){
          Route::view('/home','dashboard.admin.home')->name('home');
          Route::get('profile',[AdminController::class,'profile'])->name('profile');
          Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
          Route::view('/AdminAriticle','dashboard.admin.AdminAriticle')->name('AdminAriticle');
          Route::view('/adminmanage','dashboard.admin.adminmanage')->name('adminmanage');
          Route::post('/create',[AdminController::class,'create'])->name('create');
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
          Route::post('/addArticle',[ManageArticleController::class,'add'])->name('addArticle');
          Route::get('/addArticleDetail/{ArticleID}',[ManageArticleController::class,'articledetail'])->name('addArticleDetail');
          Route::post('/Deletearticle/{ArticleID}',[ManageArticleController::class,'Deletearticle'])->name('Deletearticle');
          Route::post('/Updatearticle/{ArticleID}',[ManageArticleController::class,'Update'])->name('Updatearticle');


          
    });

});

//! ------------------------ Loaner -------------------------------------------
Route::prefix('loaner')->name('loaner.')->group(function(){
       
   Route::middleware(['guest:loaner','PreventBackHistory'])->group(function(){
          Route::get('/login',[BorrowerController::class,'gomulti'])->name('login');
          Route::view('/register','dashboard.loaner.register')->name('register');
          Route::post('/create',[LoanerController::class,'create'])->name('create');
          Route::post('/check',[LoanerController::class,'check'])->name('check');
    });

    Route::middleware(['auth:loaner','PreventBackHistory'])->group(function(){
          Route::view('/home','dashboard.loaner.home')->name('home');
          Route::get('profile',[LoanerController::class,'profile'])->name('profile');
          Route::post('update-profile-info',[LoanerController::class,'updateInfo'])->name('loanerUpdateInfo');
          Route::post('change-profile-picture',[LoanerController::class,'updatePicture'])->name('loanerUpdatePicture');
          Route::view('/menu','dashboard.loaner.menu')->name('menu');
          Route::view('/menu2','dashboard.loaner.menu2')->name('menu2');
          Route::view('/menu3','dashboard.loaner.menu3')->name('menu3');
          Route::view('/menu4','dashboard.loaner.menu4')->name('menu4');
          Route::view('/menu5','dashboard.loaner.menu5')->name('menu5');
          Route::view('/article','dashboard.loaner.article')->name('article');
          Route::post('/updateBorrowlist/{id}',[BorrowlistController::class,'update'])->name('updateBorrowlist');
          Route::post('/updateCriterion/{id}',[BorrowlistController::class,'updateCri'])->name('updateCriterion');
          Route::get('/setpublic/{id},{status}',[BorrowlistController::class,'setpublic'])->name('setpublic');
          Route::post('/logout',[LoanerController::class,'logout'])->name('logout');
          
          Route::get('/addborrowlist/{id}', [App\Http\Controllers\WEBAPP\Loaners\BorrowlistController::class, 'create']);
          Route::get('/insertCri/{borrowlistID}', [App\Http\Controllers\WEBAPP\Loaners\BorrowlistController::class, 'insertCri']);
          Route::get('/setborrowlist/{id}', [App\Http\Controllers\WEBAPP\Loaners\LoanerController::class, 'setborrowlist']);

          //menu request
          Route::get('/requestMenu1',[LoanerRequestController::class,'request'])->name('requestMenu1');
          Route::get('/requestMenu2',[LoanerRequestController::class,'request2'])->name('requestMenu2');
          Route::get('/requestMenu1Detail/{requestID}',[LoanerRequestController::class,'ViewBorrowerRequest'])->name('requestMenu1Detail');
          Route::get('/requestMenu2Detail/{requestID}',[LoanerRequestController::class,'ViewBorrowerRequest2'])->name('requestMenu2Detail');
          Route::post('/updatePass/{id}',[LoanerRequestController::class,'updatePass'])->name('updatePass');
          Route::post('/updateUnpass/{id}',[LoanerRequestController::class,'updateUnpass'])->name('updateUnpass');

          //borrowdetail
          Route::post('/addBorrowDetail/{id}',[LoanerBorrowDetailController::class,'add'])->name('addBorrowDetail');
          Route::get('/Manu3detail/{BorrowDetailID}',[LoanerBorrowDetailController::class,'ManuGetMoneydetail'])->name('Manu3detail');

          //history
          Route::post('/confrimBill/{historyDetailID}',[LoanerHistoryController::class,'confrim'])->name('confrimBill');
          Route::post('/cancleBill/{historyDetailID}',[LoanerHistoryController::class,'cancle'])->name('cancleBill');

          //article
          Route::get('/articledetail/{ArticleID}',[ArticleController::class,'articledetailLoaner'])->name('articledetail');

          //bank
          Route::post('/deleteBank/{bankID}',[LoanerBankController::class,'delete'])->name('deleteBank');
          Route::post('/addBank/{LoanerID}',[LoanerBankController::class,'create'])->name('addBank');


    });

 });


 //! ------------------------ Borrower -------------------------------------------
Route::prefix('borrower')->name('borrower.')->group(function(){

    Route::middleware(['guest:borrower','PreventBackHistory'])->group(function(){
            Route::get('/login',[BorrowerController::class,'gomulti'])->name('login');
            Route::view('/register','dashboard.borrower.register')->name('register');
            Route::post('/create',[BorrowerController::class,'create'])->name('create');
            Route::post('/check',[BorrowerController::class,'check'])->name('check');
        });

     Route::middleware(['auth:borrower','PreventBackHistory'])->group(function(){
            Route::view('/home','dashboard.borrower.home')->name('home');
            Route::get('/profile',[BorrowerController::class,'profile'])->name('profile');
            Route::get('/pin',[BorrowerController::class,'pined'])->name('pin');
            Route::post('update-profile-info',[BorrowerController::class,'updateInfo'])->name('borrowerUpdateInfo');
            Route::post('change-profile-picture',[BorrowerController::class,'updatePicture'])->name('borrowerUpdatePicture');
            Route::view('/menu1','dashboard.borrower.menu1')->name('menu1');
            Route::view('/menu2','dashboard.borrower.menu2')->name('menu2');
            Route::view('/menu3','dashboard.borrower.menu3')->name('menu3');
            Route::view('/menu4','dashboard.borrower.menu4')->name('menu4');
            Route::view('/menu5','dashboard.borrower.menu5')->name('menu5');
            Route::view('/article','dashboard.borrower.article')->name('article');
            Route::post('logout',[BorrowerController::class,'logout'])->name('logout');

            //request
            Route::get('/viewborrower/{id}',[ListController::class,'viewborrower'])->name('viewborrower');
            Route::post('/addRequest/{borrowlistID}',[BorrowerRequestController::class,'addRequest'])->name('addRequest');
            Route::get('/updateUnpass/{id}',[BorrowerRequestController::class,'updateUnpass'])->name('updateUnpass');
            Route::get('/menu2Detail/{RequestID}',[BorrowerRequestController::class,'viewConfirmedDetail'])->name('menu2Detail');
            Route::post('/updateAccept/{id}',[BorrowerRequestController::class,'updateAccept'])->name('updateAccept');
            Route::get('/menu3Detail/{BorrowDetailID}',[BorrowerBorrowDetailController::class,'ManuPaydetail'])->name('menu3Detail');
            Route::post('/payment/{BorrowDetailID}',[BorrowerBorrowDetailController::class,'payment'])->name('payment');
            Route::post('/crateHistoryBill/{BorrowDetailID}',[BorrowerBorrowDetailController::class,'crateHistoryBill'])->name('crateHistoryBill');

            //article
            Route::get('/articledetail/{ArticleID}',[ArticleController::class,'articledetail'])->name('articledetail');

            //pin
            Route::get('/addPin/{borrowerID}/{BorrowelistID}',[ListController::class,'addpined'])->name('addPin');
            Route::get('/removePin/{borrowerID}/{BorrowelistID}',[ListController::class,'delete'])->name('removePin');
        });

 });
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Loaner
Route::get('Loaner/{LoanerID}', 'API\Loaner\LoanerController@index');
Route::post('Loaner/login', 'API\Loaner\LoanerController@login');
Route::post('Loaner/regis', 'API\Loaner\LoanerController@create');
Route::put('Loaner/update/{id}', 'API\Loaner\LoanerController@update');//
Route::post('Loaner/update/{id}', 'API\Loaner\LoanerController@update');//
Route::put('setborrowlist/{id}', 'API\Loaner\LoanerController@setborrowlist');//
Route::post('setborrowlist/{id}', 'API\Loaner\LoanerController@setborrowlist');

//Loaner -process
Route::post('Loaner/list/{id}', 'API\Loaner\BorrowerlistController@create');
Route::get('Loaner/show/{id}', 'API\Loaner\BorrowerlistController@index');
Route::put('setpublic/{id},{status}', 'API\Loaner\BorrowerlistController@setpublic');//
Route::post('setpublic/{id},{status}', 'API\Loaner\BorrowerlistController@setpublic');
Route::put('Loaner/updateborrow/{id}', 'API\Loaner\BorrowerlistController@update');//
Route::post('Loaner/updateborrow/{id}', 'API\Loaner\BorrowerlistController@update');
Route::post('AddCriterion/{id}', 'API\Loaner\CriterionController@create');
Route::post('insertCriterion/{borrowlistID}', 'API\Loaner\CriterionController@insertCri');
Route::get('Loaner/showCriterion/{id}', 'API\Loaner\CriterionController@index');
Route::get('checkCriterion/', 'API\Loaner\CriterionController@check');
Route::put('UpdateCriterion/{id}', 'API\Loaner\CriterionController@update');//
Route::post('UpdateCriterion/{id}', 'API\Loaner\CriterionController@update');//
Route::get('viewCriterion/{criterionID}', 'API\Loaner\CriterionController@view');
Route::DELETE('Loaner/deleteCriterion/{id}', 'API\Loaner\CriterionController@delete');

//Loaner-bank
Route::post('Loaner/addbank/{LoanerID}', 'API\Loaner\BankController@create');
Route::get('Loaner/viewbank/{LoanerID}', 'API\Loaner\BankController@index');
Route::DELETE('Loaner/deleteBank/{bankID}', 'API\Loaner\BankController@delete');

//Loaner -MENU
Route::get('Menu1request/{LoanerID}', 'API\Loaner\RequestController@request');
Route::get('DetailMenu1request/{requestID}', 'API\Loaner\RequestController@ViewBorrowerRequest');
Route::post('updateUnpass/{id}', 'API\Loaner\RequestController@updateUnpass');//
Route::post('updatePass/{id}', 'API\Loaner\RequestController@updatePass');//




//Borrower
Route::post('Borrower/login', 'API\Borrower\BorrowerController@login');
Route::post('Borrower/regis', 'API\Borrower\BorrowerController@create');
Route::put('Borrower/update/{id}', 'API\Borrower\BorrowerController@update');//
Route::post('Borrower/update/{id}', 'API\Borrower\BorrowerController@update');//
Route::get('Borrower/{BorrowerID}', 'API\Borrower\BorrowerController@index');
Route::get('list/', 'API\Borrower\ListController@index');
Route::get('pined/{borrowerID},{BorrowelistID}', 'API\Borrower\ListController@pined');
Route::post('Addpined', 'API\Borrower\ListController@addpined');
Route::DELETE('deletepined/{borrowerID},{BorrowelistID}', 'API\Borrower\ListController@delete');
Route::DELETE('deleteRequest/{RequestID}', 'API\Borrower\RequestController@delete');
Route::get('viewpined/{id}', 'API\Borrower\PinedController@index');
Route::get('count/{BorrowerID}', 'API\Borrower\RequestController@count');


//Borrower menu
Route::post('AddRequest', 'API\Borrower\RequestController@addRequest');
Route::get('viewrequest/', 'API\Borrower\RequestController@viewRequest');
Route::get('viewunpass/', 'API\Borrower\RequestController@viewUnpass');
Route::get('viewConfirmed/{BorrowerID}', 'API\Borrower\RequestController@viewConfirmed');
Route::post('updateUnpassChecked/{id}', 'API\Borrower\RequestController@updateUnpassChecked');//
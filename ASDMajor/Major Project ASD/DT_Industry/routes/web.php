<?php

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

Route::get('/addprocurement',[
			'uses' => 'HomeController@addprocurement',
			'as' => 'addprocurement'
		]);

Route::post('/post',[
			'uses' => 'PostController@post',
			'as' => 'Post'
		]);
Route::get('/notification',[
			'uses' => 'NotificationController@notification',
			'as' => 'notification'
		]);
Route::get('/notif',[
			'uses' => 'HomeController@notif',
			'as' => 'notif'
		]);
Route::post('/arrayToObject',[
			'uses' => 'ExcelController@arrayToObject',
			'as' => 'arrayToObject'
		]);



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/payable', 'HomeController@payable')->name('payable');
Route::get('/pettycash', 'HomeController@pettycash')->name('pettycash');
Route::get('/undelivered', 'HomeController@undelivered')->name('undelivered');
Route::get('/cancelled', 'HomeController@cancelled')->name('cancelled');
Route::get('/failedbid', 'HomeController@failedbid')->name('failedbid');
Route::get('/procurementstatus', 'HomeController@procurementstatus')->name('procurementstatus');
Route::get('/editprocurement/{id}', 'HomeController@editprocurement')->name('editprocurement');
Route::post('/EditController/{pr_id}', 'EditController@edit')->name('edit');
Route::get('/SearchController', 'SearchController@search')->name('search');
Route::get('/ItemSearch', 'HomeController@forSearch')->name('ItemSearch');
Route::get('/getImport', 'ExcelController@getImport')->name('getImport');
Route::post('/postImport', 'ExcelController@postImport')->name('postImport');
Route::get('/getExportHome', 'ExcelController@getExportHome')->name('getExportHome');
Route::get('/getExportPayable', 'ExcelController@getExportPayable')->name('getExportPayable');
Route::get('/getExportPettyCash', 'ExcelController@getExportPettyCash')->name('getExportPettyCash');
Route::get('/getExportUndelivered', 'ExcelController@getExportUndelivered')->name('getExportUndelivered');
Route::get('/getExportCancelled', 'ExcelController@getExportCancelled')->name('getExportCancelled');
Route::get('/getExportFailedBid', 'ExcelController@getExportFailedBid')->name('getExportFailedBid');
Route::get('/cancel/{pr_id}', 'RemarksController@cancel')->name('cancel');
Route::get('/failedbid/{pr_id}', 'RemarksController@failedbid')->name('failedbid');
Route::post('/pettycash/{pr_id}', 'RemarksController@pettycash')->name('pettycash');
Route::post('/undelivered/{pr_id}', 'RemarksController@undelivered')->name('undelivered');
Route::post('/payable/{pr_id}', 'RemarksController@payable')->name('payable');
Route::get('/deletenotif/{pr_id}', 'NotificationController@deletenotif')->name('deletenotif');

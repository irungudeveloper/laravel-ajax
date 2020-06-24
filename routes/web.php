<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/tables','datatables');
Route::view('/student','111841.student');
Route::view('/pay','111841.payment_form');
Route::post('/register_student','StudentsController@save');
Route::view('/students/all','111841.view_students');
Route::get('/studentData','StudentsController@index');
Route::get('edit/{id}','StudentsController@edit');
Route::post('update/{id}','StudentsController@update');
Route::post('delete/{id}','StudentsController@delete');
Route::post('/getBalance/{id}','PaymentRecordsController@getBalance');
Route::get('/getID','PaymentRecordsController@getStudentId');
Route::post('/savePayment','PaymentRecordsController@saveStudentPayment');
Route::get('/all/records','PaymentRecordsController@getAllRecords');
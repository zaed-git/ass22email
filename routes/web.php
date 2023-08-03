<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PromotionalEmailAllController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/create-customers',[CustomerController::class,'CreateCustomer']);
Route::post('/update-customers',[CustomerController::class,'UpdateCustomer']);
Route::post('/delete-customers',[CustomerController::class,'CustomereDelete']);
Route::get('/customers-list',[CustomerController::class,'CustomerList']);
Route::post('/customers-list-byID',[CustomerController::class,'CustomerListById']);

//sent mail
//Route::get('/send_promotional_email_all', [PromotionalEmailAllController::class, 'showForm'])->name('show_promotional_email_all_form');
Route::post('/send_promotional_email_all', [PromotionalEmailAllController::class, 'sendEmail']);



//pages routes
Route::get('/',[CustomerController::class,'CustomerPages']);
Route::get('/mailPage',[PromotionalEmailAllController::class,'MailPage']);
<?php

use App\Http\Controllers\admin\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\PasswordResetController;
use App\Http\Controllers\admin\UploadCsvController;
use App\Http\Controllers\admin\UserProfileController;
use App\Http\Controllers\admin\UsersController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

## Password Routes ##
Route::get('password',[PasswordResetController::class,'index']);
Route::patch('password/update',[PasswordResetController::class,'update']);

## Profile Routes ##
Route::get('profile',[UserProfileController::class,'index']);
Route::patch('profile/update',[UserProfileController::class,'update']);
//email verify route
Route::get('verify-email/{token}',[UserProfileController::class,'verifyEmail']);
Route::post('email/resend',[UserProfileController::class,'resendEmail']);
Route::post('email/cancel',[UserProfileController::class,'cancelEmailUpdate']);


Route::post('users/disable/{uuid}',[UsersController::class,'disableUser']);
Route::get('users/disabled',[UsersController::class,'disabledUser']);

Route::resource('users', 'App\Http\Controllers\admin\UsersController');

Route::resource('mails', 'App\Http\Controllers\admin\MailController');

Route::get('csv',[UploadCsvController::class,'index']);
Route::get('csv/upload',[UploadCsvController::class,'upload']);
Route::post('csv/upload/store',[UploadCsvController::class,'uploadCsv']);

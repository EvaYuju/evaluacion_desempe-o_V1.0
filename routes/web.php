<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SurveyUserController;
use App\Http\Controllers\ScaleController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\OptionController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('centers', CenterController::class);
Route::resource('users', UserController::class);
Route::resource('surveys', SurveyController::class);
Route::resource('survey_users', SurveyUserController::class);
Route::resource('scales', ScaleController::class);
Route::resource('questions', QuestionController::class);
Route::resource('answers', AnswerController::class);
Route::resource('options', OptionController::class);


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
use App\Http\Controllers\CategoryController;

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
Route::resource('categories', CategoryController::class);

Route::get('/api/category/{categoryId}/questions', [CategoryController::class, 'getQuestionsByCategory']);
Route::get('/api/survey/{surveyId}/questions', [SurveyController::class, 'getQuestionsBySurvey']);
Route::get('/api/survey/{surveyId}/questions/{questionId}/options', [SurveyController::class, 'getOptionsByQuestion']);
Route::get('/api/survey/{surveyId}/questions/{questionId}/answers', [SurveyController::class, 'getAnswersByQuestion']);



<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

//test email
Route::get('test', function () {
    $job = Job::first();

    TranslateJob::dispatch($job);

    return 'done';
});

//home page
Route::view('/', 'welcome');
//jobs board
Route::controller(JobController::class)->group(function () {
    Route::get('/jobs','index');
//creating a new job
    Route::get('/jobs/create','create');
//displaying a new job
    Route::get('/jobs/{job}','show');
//store
    Route::post('/jobs','store')
        ->middleware('auth');
//edit
    Route::get('/jobs/{job}/edit','edit')
        ->middleware('auth')
        ->can('can:edit,job');
//update
    Route::patch('/jobs/{job}','update');
//delete
    Route::delete('/jobs/{job}', 'destroy');
});

//static views
Route::view('/about','about');
Route::view('/contact','contact');

//user

//registration
Route::get('/register',[UserController::class,'create']);
Route::post('/register',[UserController::class,'store']);

Route::get('/login',[SessionController::class,'create']);
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class,'destroy']);

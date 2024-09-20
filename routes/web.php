<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function () {
    return view('jobs',[
        'jobs'=>[
            [
                'id'=>1,
                'title'=>'Director',
                'salary'=>'$512000'
            ], [
                'id'=>2,
                'title'=>'programmer',
                'salary'=>'$5120000'
            ], [
                'id'=>3,
                'title'=>'teacher',
                'salary'=>'$512000'
            ],
        ]
    ]);
});
Route::get('/jobs/{id}', function ($id) {

        $jobs = [
            [
                'id'=>1,
                'title'=>'Director',
                'salary'=>'$512000'
            ], [
                'id'=>2,
                'title'=>'programmer',
                'salary'=>'$5120000'
            ], [
                'id'=>3,
                'title'=>'teacher',
                'salary'=>'$512000'
            ],
        ];

       $job= Arr::first($jobs,fn($job)=> $job['id'] == $id);

        return view('job',['job'=>$job]);

});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

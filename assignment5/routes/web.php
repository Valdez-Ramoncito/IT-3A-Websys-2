<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/evaluation', function () {
    $studname = "Maria Lopez";
    $prelimgrade = "92";
    $midtermgrade = "88";
    $finalgrade = "94";

    return view('/evaluation.evaluation', ['studname' => $studname, 'prelimgrade' => $prelimgrade, 'midtermgrade' => $midtermgrade, 'finalgrade' => $finalgrade]);
});

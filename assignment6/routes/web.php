<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/{studID}/{name}', function ($studID, $name) {
    return view('student.studentinfo', ['studID' => $studID,'name' => $name]);
});

Route::get('/course/{course}/{yearlevel?}', function ($course , $yearlevel = null) {
    return view('course.studentcourse', ['course' => $course,'yearlevel' => $yearlevel]);
});

Route::get('/ojt/{company}/{city}/{allowance?}', function ($company , $city, $allowance = null) {
    return view('ojt.ojt', ['companyname' => $company,'city' => $city, 'allowance' => $allowance]);
});

Route::get('/event/{event}/{participant}/{yearlevel}', function ($event , $participant, $yearlevel) {
    return view('event.event', ['eventname' => $event,'participantname' => $participant, 'yearlevel' => $yearlevel]);
});

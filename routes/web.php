<?php

use Illuminate\Support\Facades\Route;

//ROUTES

//Accueil
Route::get('/', function () {
    return view('welcome');
});

//ACTUALITES
Route::get('/actualites', function() {
    return view('actualites');
});

//SERVICES
Route::get('/services', function() {
    return view('services');
});

//CONTACT
Route::get('/contact', function() {
    return view('contact');
});

//LOGIN
Route::get('/login', function () {
    return view('login');
});

//REGISTER
Route::get('/register', function () {
    return view('register');
});

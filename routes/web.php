<?php

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
    if(isset($_COOKIE['key_auth'])){
        return redirect("/painel");
    }
    return view('login');
});

Route::get('/registrar', function () {
    if(isset($_COOKIE['key_auth'])){
        return redirect("/painel");
    }
    return view('register');
});

Route::get('/add', function () {
    if(!isset($_COOKIE['key_auth'])){
        return redirect("/");
    }
    return view('add');
});




Route::get('/logout', function () {
    setcookie("key_auth");
    
    return redirect('/');
});


Route::get('/loginauth', 'AuthController@login');
Route::get('/registerauth', 'AuthController@register');
Route::get('/painel', 'PainelController@painel');

Route::post('/produtos', 'AddController@add');
Route::get('/produtos/del/{id}', 'AddController@del');



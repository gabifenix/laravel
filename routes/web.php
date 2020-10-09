<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/oi', function () {
    return 'oi mundo';
});

Route::get('/Gabriel', function () {
    return 'Gabriel Danilo Benetti';
});

Route::get('/ola/{nome?}', function($nome=null) {
    if(isset($nome)){
        return 'Olá'.$nome.'<br>';
    } else {
        return 'Olá anônimo';
    }
});

Route::get('/rotascomregras/{nome}/{n}', function($nome, $n){
    for($x=0;$x<$n;$x++){
        echo "Olá $nome <br>";
    }
})->where('nome','[A-Za-z]+')->where('n','[0-9]+');

Route::prefix('/app')->group(function(){
    Route::get('/', function () {
        return view('app');
    })->name('app');
    Route::get('/user', function () {
        return view('user');
    })->name('app.user');;
    Route::get('/profile', function () {
        return view('profile');
    })->name('app.profile');;
});

Route::redirect('bla', '/app', 301);

Route::get('bla1', function() {
    return redirect()->route('app');
});

Route::get('/', function () {
    return 'Oi Mundo';
});
Route::post('/', function () {});
Route::put('/', function () {});
Route::delete('/', function () {});
Route::any('/', function () {});
Route::match([ 'get', 'post'], '/', function () {});

Route::resource('cliente', 'ClienteControlador');
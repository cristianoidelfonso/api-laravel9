<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Referencias
// https://www.twilio.com/blog/criar-e-consumir-uma-api-restful-no-php-laravel
// https://hcode.com.br/blog/criando-api-php-com-laravel-e-postgresql

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//  Endpoints (/api/v1/...)
Route::prefix('v1')->group(function(){

    Route::resource('/students', StudentController::class)->names('students');

});


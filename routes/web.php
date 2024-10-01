<?php

use App\Http\Controllers\CadernoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

    Route::get('/cadernos',[CadernoController::class,'index'])->name('cadernos,index');

    Route::get('/cadernos/create',[CadernoController::class,'create'])->name('cadernos.create');

    Route::post('/cadernos',[CadernoController::class,'store'])->name('cadernos.store');

    Route::get('/cadernos/{caderno}',[CadernoController::class,'edit'])->name('cadernos.edit');

    Route::put('/cadernos/{caderno}',[CadernoController::class,'update'])->name('cadernos.update');

    Route::delete('/cadernos/{caderno}',[CadernoController::class,'destroy'])->name('cadernos,destroy');
});

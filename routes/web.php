<?php

//deve inserir a referencia aqui para conseguir usar o controller
use App\Http\Controllers\AutorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', [Dashboard::class, 'dashboard'])->name('dashboard');

//Chamando rota para usar o controller.
//Listar geral

Route::prefix('autor')->group(function () {

    Route::get('/index',[AutorController::class,'index'])->name('autor.index');
    Route::get('/create',[AutorController::class,'create'])->name('autor.create');
    Route::get('/edit/{id}',[AutorController::class,'edit'])->name('autor.edit');
    Route::get('/destroy/{id}',[AutorController::class,'destroy'])->name('autor.destroy');
    Route::get('/show/{id}',[AutorController::class,'show'])->name('autor.show');
    Route::get('/delete/{id}',[AutorController::class,'delete'])->name('autor.delete');

    
    Route::post('/store',[AutorController::class,'store'])->name('autor.store');
    Route::delete('/destroy/{id}',[AutorController::class,'destroy'])->name('autor.destroy');
    


    Route::put('/update/{id}',[AutorController::class,'update'])->name('autor.update');
});
<?php

use App\Http\Controllers\RecipeController;
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


// New route
Route::get('/home', function () {
    return 'This is home';
});

// Crud Routes
Route::get('/list' , [RecipeController::class , 'index'])->name('recipe.index');
Route::get('/create' , [RecipeController::class , 'create'])->name('recipe.create');
Route::post('/create' , [RecipeController::class , 'store']);
Route::get('/edit/{recipeId}' , [RecipeController::class , 'edit'])->name('recipe.edit');
Route::put('/edit/{recipeId}' , [RecipeController::class , 'update']);
Route::delete('/delete/{recipeId}' , [RecipeController::class , 'delete'])->name('recipe.destroy');
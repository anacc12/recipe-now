<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);


Route::post('recipe/upload', [RecipeController::class, 'upload']);
Route::post('recipe/save-recipe', [RecipeController::class, 'saveRecipe']);
Route::get('recipe/get-recipes', [RecipeController::class, 'getRecipes']);
Route::get('get-recipe/{id}', [RecipeController::class, 'getRecipe']);
Route::post('/edit-recipe', [RecipeController::class, 'editRecipe']);
Route::post('edit-recipe/upload', [RecipeController::class, 'upload']);
Route::get('get-userrecipes/{id}', [RecipeController::class, 'getUserRecipes']);


Route::any('{slug}', function () {
    return view('welcome');
});

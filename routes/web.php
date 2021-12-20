<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Dashboard;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/project.create', function () {
    return view('project.create');
})->name('project.create');


Route::middleware(['auth:sanctum', 'verified'])->post
('/project.create', [ProjectController::class,'create'])->name('project.create');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',
    [Dashboard::class,"render"])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('project-delete',[ProjectController::class,'delete'])->name("project-delete");
Route::middleware(['auth:sanctum', 'verified'])->get('project-edit',[ProjectController::class,'edit'])->name("project-edit");
Route::middleware(['auth:sanctum', 'verified'])->get('project-view',[ProjectController::class,'view'])->name("project-view");



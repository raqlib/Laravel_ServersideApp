<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'getMain']) -> name('home');
Route::get('/all-users', [UserController::class, 'getAllUsers']) -> name('users.all');
Route::get('/add-user', [UserController::class, 'getAddUser']) -> name('users.add');
Route::get('/all-tasks', [TasksController::class, 'getMain']) -> name('tasks.all');

//Rota para mostrar o formulário para adicionar tarefa
Route::get('/add-task', [TasksController::class, 'getAddTask']) -> name('tasks.add');

Route::get('/view-user/{id}', [UserController::class, 'viewUser']) -> name('users.view');
Route::get('/delete_contact/{id}', [UserController::class, 'deleteContact']) -> name('delete_contact');
Route::get('/all_tasks/{id}', [TasksController::class, 'viewTask']) -> name('tasks.all_task');
Route::get('/delete_task/{id}', [TasksController::class, 'deleteTask']) -> name('delete_task');

Route::post('/store-user}', [UserController::class, 'storeUser']) -> name('users.store');

//Rota para fazer o post das tarefas na base de dados
Route::post('/store-task}', [TasksController::class, 'storeTask']) -> name('tasks.store');

//Rota para fazer o post das tarefas com update na base de dados. O name é o nome da rota. O updateTask é o nome da função.
Route::post('/update-task}', [TasksController::class, 'updateTask']) -> name('tasks.update');




//Rota para ver todas as prendas
Route::get('/all-gifts', [GiftController::class, 'getMain']) -> name('gifts.all');

//Rota para adicionar prendas(mostrar o formulário)
Route::get('/add-gifts', [GiftController::class, 'getAddGift']) -> name('gifts.add');

//Rota para fazer o post das prendas adicionadas na base de dados
Route::post('/store-gift}', [GiftController::class, 'storeGift']) -> name('gifts.store');


//Rota para ver as prendas pelo seu id
Route::get('/view-gift/{id}', [GiftController::class, 'viewGift']) -> name('gifts.view');

//Rota para fazer o post das prendas com update na base de dados. O name é o nome da rota. O updateGift é o nome da função.
Route::post('/update-gift}', [GiftController::class, 'updateGift']) -> name('gifts.update');






Route::fallback(function () {
    return  view('errors.fallback');
});



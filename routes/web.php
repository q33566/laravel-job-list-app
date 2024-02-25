<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
// list all jobs
Route::get('/', [JobController::class, 'index']);

// create job
Route::get('/jobList/create', [JobController::class, 'create']);

// show create form
Route::post('/jobList', [JobController::class, 'store']);

// edit listing page
Route::get('/joblist/{job}/edit', [JobController::class, 'edit']);

// update listing page
Route::put('jobList/{job}', [JobController::class, 'update']);

// delete listing page
Route::delete('jobList/{job}', [JobController::class, 'destory']);

// list single job
Route::get('/jobList/{job}', [JobController::class, 'show']);

// show register page
Route::get('/register', [UserController::class, 'create']);

// store user information
Route::post('/users', [UserController::class, 'store']);

// user logout
Route::post('/logout', [UserController::class, 'logout']);

// show login page
Route::get('/login', [UserController::class, 'login']);

//user login
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



















/*route basic
Route::get('/hello', function () {
    return response('<h1>hello<h1>')
            ->header('foo','bar')
            ->header('Content-Type','text/plain');
});

Route::get('/post1/{id}',function($id){
    return response('post'.$id);
})->where('id','[0-9]+'); 

Route::get('/search',function(Request $request){
    return $request->name . ' ' . $request->city;
});
*/
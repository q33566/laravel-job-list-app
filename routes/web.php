<?php

use App\Http\Controllers\JobController;
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
Route::get('/jobList/create',[JobController::class, 'create']);

// show create form
Route::post('/jobList',[JobController::class, 'store']);








// list single job
Route::get('/jobList/{job}',[JobController::class, 'show']);




















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
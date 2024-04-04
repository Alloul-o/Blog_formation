<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth', 'role:admin')->group(function () {
// Routes for articles
Route::get('/articles',  [ArticleController::class,'index']);
Route::get('/articles/{article}', [ArticleController::class,'show'] );
Route::post('/articles', [ArticleController::class,'store'] );
Route::put('/articles/{article}', [ArticleController::class,'update'] );
Route::delete('/articles/{article}', [ArticleController::class,'delete'] );

//Route for one article and its comments
Route::get('/articles/{article}/comments', [ArticleController::class,'GetCommentsOfArticle'] );
});

Route::middleware('auth', 'role:user')->group(function () {
   
// Routes for comments
Route::get('/comments', [CommentController::class, 'index']);
Route::post('/comments', [CommentController::class, 'store']);
Route::get('/comments/{comment}', [CommentController::class, 'show']);
Route::put('/comments/{comment}', [CommentController::class, 'update']);
Route::delete('/comments/{comment}', [CommentController::class, 'destroy']);
});
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login',  [AuthController::class, 'login']);
    Route::post('logout',  [AuthController::class, 'logout']);
    


});
<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserController;

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

Route::middleware(['auth'])->group(function () {



Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/forums' , [ForumController::class , 'index'])
->name('forum.index')->withoutMiddleware('auth');

Route::get('/forums/{slug}',[ForumController::class , 'show'])
->name('forum.show')->withoutMiddleware('auth');

Route::get('/forums/c/{slug}',[ForumController::class , 'category'])
->name('category.show')->withoutMiddleware('auth');

Route::get('/forums/{id}-{slug}/lock',[ForumController::class , 'lock'])
->name('forum.lock');


Route::get('/forums/{id}-{slug}/unlock',[ForumController::class , 'unlock'])
->name('forum.unlock');

Route::get('/test' ,[TestController::class , 'test' ])->withoutMiddleware('auth');;

Route::get('/forums/messages/{id}' ,[ MessageController::class , 'show'])
->name('message.show')->withoutMiddleware('auth');
Route::get('/forums/messages/{id}/edit' ,[ MessageController::class , 'edit'])
->name('message.edit');
Route::get('/forums/messages/{id}/delete' ,[ MessageController::class , 'delete'])
->name('message.delete');
Route::post('/forums/messages/{id}/like' ,[ MessageController::class , 'like'])
->name('message.like');
Route::get('/' ,[ PageController::class , 'index'  ])
->name('index')->withoutMiddleware('auth');
Route::get('/members' ,[ PageController::class , 'members'  ])
->name('members')->withoutMiddleware('auth');
Route::get('/team' ,[ PageController::class , 'team'  ])
->name('team')->withoutMiddleware('auth');

Route::post('/forums/reports/{id}' , [ReportController::class , 'message'])
->name('report.message');

Route::get('/forums/threads/{slug}' ,[ ThreadController::class , 'show'  ])
->name('thread.show')->withoutMiddleware('auth');
Route::get('/forums/threads/{slug}/new-thread' ,[ ThreadController::class , 'new'  ])
->name('thread.new');
Route::post('/forums/threads/{slug}/delete' ,[ ThreadController::class , 'delete'  ])
->name('thread.delete');

Route::get('/forums/threads/{slug}/lock' ,[ ThreadController::class , 'lock'  ])
->name('thread.lock');

Route::get('/forums/threads/{slug}/unlock' ,[ ThreadController::class , 'unlock'  ])
->name('thread.unlock');

Route::get('/forums/threads/{slug}/pin' ,[ ThreadController::class , 'pin'  ])
->name('thread.pin');

Route::get('/forums/threads/{slug}/unpin' ,[ ThreadController::class , 'unpin'  ])
->name('thread.unpin');

Route::get('/user/{slug}' , [UserController::class,'profile'])
->name('profile');

Route::get('/user/{slug}/messages' , [UserController::class,'messages'])
->name('user.messages');

Route::get('/user/{slug}/threads' , [UserController::class,'threads'])
->name('user.threads');
});
require __DIR__.'/admin.php';
require __DIR__.'/auth.php';






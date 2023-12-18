<?php

use App\Http\Controllers\ChatController;
use App\Livewire\Chat;
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

Route::redirect('/', '/dashboard');

Route::get('/transactions', [ChatController::class, 'index']);
Route::get('/transactions/check', [ChatController::class, 'checkStatus']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/chats', Chat::class)->name('chats');
    Route::get('/chatroom/{id}', [ChatController::class, 'show'])->name('chats.show');
    Route::get('/get-token', function(){
       $user = auth()->user();
       $token = $user->createToken('token-name');
       return response()->json([
           'token' => $token->plainTextToken,
           'type' => "Bearer",
       ]);
    });
});

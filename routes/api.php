<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\HiringRequestController;
use App\Http\Controllers\Api\ChatMeetingController;
use App\Http\Controllers\Api\VoiceMeetingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::post('/messages', [MessageController::class, 'store']);
Route::post('/hiring-requests', [HiringRequestController::class, 'store']);
Route::post('/chat-meetings', [ChatMeetingController::class, 'store']);
Route::post('/voice-meetings', [VoiceMeetingController::class, 'store']);

Route::group(['middleware' => ["auth:sanctum"]], function(){
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('logout', [UserController::class, 'logout']);

    Route::prefix('messages')->group(function () {
        Route::get('/', [MessageController::class, 'index']);
        Route::get('/{message}', [MessageController::class, 'show']);
        Route::delete('/{message}', [MessageController::class, 'destroy']);
        Route::post('/filter', [MessageController::class, 'filter']);
    });
    Route::prefix('hiring-requests')->group(function () {
        Route::get('/', [HiringRequestController::class, 'index']);
        Route::get('/{hiring_request}', [HiringRequestController::class, 'show']);
        Route::delete('/{hiring_request}', [HiringRequestController::class, 'destroy']);
    });
    Route::prefix('chat-meetings')->group(function () {
        Route::get('/', [ChatMeetingController::class, 'index']);
        Route::get('/{chat_meeting}', [ChatMeetingController::class, 'show']);
        Route::delete('/{chat_meeting}', [ChatMeetingController::class, 'destroy']);
    });
    Route::prefix('voice-meetings')->group(function () {
        Route::get('/', [VoiceMeetingController::class, 'index']);
        Route::get('/{voice_meeting}', [VoiceMeetingController::class, 'show']);
        Route::delete('/{voice_meeting}', [VoiceMeetingController::class, 'destroy']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

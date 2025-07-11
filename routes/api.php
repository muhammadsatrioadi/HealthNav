<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// GitHub Webhook Route (sesuai dengan URL dari CyberPanel)
Route::post('https://195.88.211.104:8090/websites/yhotech.my.id/webhook', [App\Http\Controllers\WebhookController::class, 'handleGithubWebhook']);

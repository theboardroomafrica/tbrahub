<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/add-application', function (Request $request) {
    $application = App\Models\Application::create($request->all());
    // \Illuminate\Support\Facades\Log::info('Request Body:', $request->all());
    return response()->json(["status" => "success", "application" => $application], 200);
});

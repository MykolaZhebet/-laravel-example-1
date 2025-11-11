<?php

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiJobController;
use App\Http\Controllers\Api\ApiLoginController;
use App\Http\Controllers\Api\ApiRegisteredController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function () {
    return ['message' => 'hello from api'];
});


// Route::get('/jobs', function () {
//     // $jobs = Job::with('employer')->paginate(2);
//     // $jobs = Job::with('employer')->simplePaginate(2);
//     $jobs = Job::with(['employer', 'tags'])->latest()->paginate(2);
//     return  [
//         'jobs' => $jobs,
//         'tags' => Tag::all()
//     ];
// });

Route::prefix('v1')->group(function () {
    Route::post('login', [ApiLoginController::class, 'store'])
        //Throttle to 6 request per minute
        ->middleware('throttle:6:1');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::apiResource('/jobs', ApiJobController::class);
        Route::post('register', [ApiRegisteredController::class, 'store']);
    });
});


// require __DIR__ . '/auth.php';

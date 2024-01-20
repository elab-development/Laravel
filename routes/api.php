<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\ProjectionController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::post('/login', function (Request $request) {
//     $user = User::where('email', $request->email)->first();
//     if (! $user || ! Hash::check($request->password, $user->password)) {
//         return response()->json([
//             "error"=>"Credentials are not valid"
//         ],400);
//     }

//     return $user->createToken($request->email)->plainTextToken;
// });

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResources([
        '/movies'=>MovieController::class,
        '/projections'=>ProjectionController::class,
    ]);
});

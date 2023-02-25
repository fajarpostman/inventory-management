<?php

use App\Http\Controllers\Api\Roles\RolesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(RolesController::class)->group(function() {
    Route::post('store', 'storeRoles');
});

// Route::group(['prefix' => 'roles', 'as' => 'roles'], function() {
//     Route:post('store', [Roles::class, 'storeRoles']);
// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

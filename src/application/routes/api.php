<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Authenticate;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|[ProgramController::class, 'testttt']
*/
Route::post('login', [Authenticate::class, 'apilogInAction']);
Route::post('test', 'ProgramController@joel');
Route::post('dailyreport', 'ProgramController@dailyReport');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'app'], function () {
    Route::post('daily-report', 'ProgramController@dailyReport');
    Route::post('new-program', 'ProgramController@newProgram');
    Route::post('new-dailyReport', 'ProgramController@newDayReport');
    Route::post('update-dailyReport', 'ProgramController@updateDailyReport');
    Route::post(
        'update-dailyReport-notes',
        'ProgramController@updateDailyReportNotes'
    );
    Route::post('add-remainder', [ProgramController::class, 'addRemainder']);
    Route::post('dailySettings', [ProgramController::class, 'dailySettings']);
    Route::post('get-program-days', [
        ProgramController::class,
        'getProgramDays',
    ]);
    Route::post('isDayCompleted', [ProgramController::class, 'isDayCompleted']);

    Route::post('isautoCompleted', [
        ProgramController::class,
        'isautoCompleted',
    ]);
    Route::post('updatePhotoProgress', [Images::class, 'updatePhotoProgress']);
});

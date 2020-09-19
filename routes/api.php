<?php

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
/**
 * @description Register a student
 */
Route::post('/user/register', 'UserController@register')->name('api.user.register');
/**
 * @description Get a student's access_token
 */
Route::post('/user/token', 'UserController@getToken')->name('api.user.token');
/**
 * @description Login for student
 */
Route::post('/user/login', 'UserController@login')->name('api.user.login');

Route::group(['prefix' => 'user','middleware' => ['auth:api','jwt.auth']],function ()
{
    /**
     * @description Logout for student
     */
    Route::get('logout', 'UserController@logout')->name('api.user.logout');
    Route::get('user', 'UserController@getAuthUser');
    Route::get('test', 'UserController@TestAuth');
    /**
     * @description Refresh a student's access_token
     */
    Route::get('refresh', 'UserController@refresh');
});

/**
 * @description Register a doctor
 */
Route::post('/doctor/register', 'DoctorController@register')->name('api.doctor.register');
/**
 * @description Get a doctor's access_token
 */
Route::post('/doctor/token', 'DoctorController@getToken')->name('api.doctor.token');
/**
 * @description Login for doctor
 */
Route::post('/doctor/login', 'DoctorController@login')->name('api.doctor.login');

Route::group(['prefix' => 'doctor','middleware' => ['auth:doctors','jwt.auth']],function ()
{
    /**
     * @description Logout for doctor
     */
    Route::get('logout', 'DoctorController@logout')->name('api.doctor.logout');
    Route::get('user', 'DoctorController@getAuthUser');
    Route::get('test', 'DoctorController@TestAuth');
    /**
     * @description Refresh a doctor's access_token
     */
    Route::get('refresh', 'DoctorController@refresh');
});


//////////////////////////////////////////////////////////////////////////////////////////////////////////


/**
 * @description List all news
 */
Route::get('news','NewsController@index');
/**
 * @description Show the dailyprogram
 */
Route::get('program','DailyProgramController@index');
/**
 * @description List all courses
 */
Route::get('courses','CourseController@index');

//---------------------------token based---------------------------//

////Student
/**
 * @description List std's attending
 */
Route::get('student/{id}/attendings','UserController@attendings')->where('id','[0-9]+')->middleware('assign.guard:api');
/**
 * @description new std's attending
 */
Route::post('attending','UserController@NewAttending')->middleware('assign.guard:api');

////Admin
/**
 * @description Create new post
 */
Route::post('post','NewsController@store')->middleware('assign.guard:api','admin_api');
/**
 * @description Edit post
 */
Route::put('post','web\NewsController@store')->middleware('admin_web');

/**
 * @description new dailyprogram
 */
Route::post('program','DailyProgramController@store')->middleware('assign.guard:api','admin_api');

/////Doctor
/**
 * @description new std's mark
 */
Route::post('mark','MarkController@store')->middleware('assign.guard:doctors');
/**
 * @description new std's attending
 */
Route::post('doctor/attending','DoctorController@NewAttending')->middleware('assign.guard:doctors');
/**
 * @description List std's attending
 */
Route::get('doctor/student/{id}/attendings','DoctorController@attendings')->where('id','[0-9]+')->middleware('assign.guard:doctors');
/**
 * @description Create new course
 */
Route::post('course','CourseController@store')->middleware('assign.guard:doctors');
//new lecture
Route::post('upload/lecture','LectureController@lecture')->middleware('assign.guard:doctors');
//download lecture
Route::post('download/lecture','LectureController@downloadlecture');
//list std's mark
Route::get('marks/{universityID}','Markcontroller@show');
//list folder's file
Route::get('lecture','LectureController@index');
//list std's mark
Route::get('marks/{universityID}','Markcontroller@show')->middleware('assign.guard:api');
<?php

use Illuminate\Support\Facades\Route;
use App\Events\MyEvent;

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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::group(['namespace' => 'web'], function(){
    Route::get('register', [
        'as' => 'register',
        'uses' => 'UserrController@index'
      ]);
      Route::post('register', [
        'as' => '',
        'uses' => 'UserrController@Register'
      ]);
    
      Route::get('login', [
        'as' => 'login',
        'uses' => 'UserrController@userLoginIndex'
      ]);
        Route::post('login', [
            'as' => '',
            'uses' => 'UserrController@Login'
      ]);
      Route::post('logout', [
        'as' => 'logout',
        'uses' => 'UserrController@logout'
      ]);
      Route::get('dashboard', 'UserrController@dashboard');
});

Route::group(['namespace' => 'web','prefix' => 'doctor'],function ()
{
    Route::get('register', 'DoctorrController@index');
    Route::post('user-store', 'DoctorrController@Register');
    Route::get('login', 'DoctorrController@userLoginIndex');
    Route::post('login', 'DoctorrController@Login');
    Route::get('dashboard', 'DoctorrController@dashboard');
    Route::get('logout', 'DoctorrController@logout');
});

//Route::get('post/{id}','web\NewsController@show')->middleware('auth:web');
//Route::post('post','web\NewsController@store')->middleware('auth:web');

//////////////////////////////////////////////////////////////////////////////////////////////////////////

//List news
Route::get('news','web\NewsController@index');
//List dailyprogram
Route::get('program','web\DailyProgramController@index');
//List courses
Route::get('courses','web\CourseController@index');

//---------------------------session based---------------------------//

Route::group(['namespace' => 'web'],function ()
{
////Student
Route::get('student/{id}','UserrController@dashboard')->name('std.dashboard');
Route::get('student/{id}/profile','UserrController@profile')->name('std.profile');

//List std's attending
Route::get('student/{id}/attendings','UserrController@attendings')->where('id','[0-9]+');
//new std's attending
Route::post('attending','UserrController@NewAttending');
});


////Admin
//Create new post
Route::post('post',['middleware' => ['auth:web', 'admin_web']],'web\NewsController@store')->middleware('admin_web');
//new dailyprogram
Route::post('program',['middleware' => ['auth:web', 'admin_web']],'web\DailyProgramController@store')->middleware('admin_web');
//delete a post
Route::get('/del/program/{id}',['middleware' => ['auth:web', 'admin_web']],'web\DailyProgramController@destroy')->middleware('admin_web');
//delete a program
Route::get('/del/post/{id}',['middleware' => ['auth:web', 'admin_web']],'web\NewsController@destroy')->middleware('admin_web');


/////Doctor
//new std's mark
Route::post('mark','web\MarkController@store')->middleware('auth:doctors_web');
//new std's attending
Route::post('doctor/attending','web\DoctorrController@NewAttending');
//List std's attending
Route::get('doctor/student/{id}/attendings','web\DoctorrController@attendings')->where('id','[0-9]+');
//Create new course
Route::post('course','web\CourseController@store')->middleware('auth:doctors_web');
//List doctor's courses
Route::get('doctor/{id}/courses','web\DoctorrController@courses')->where('id','[0-9]+');

//////////////////////////////////////////////////////////////////////////////////////////////////////////

//Route::post( 'notify', 'NotificationController@notify' );
Route::get('notify',function(){
    App::bind('MyEvent', function(){
        return new MyEvent('hello world');
    });
    
    // get the binding
    $pusher = App::make('MyEvent');
    
    /*$pusher->trigger( 'my-channel',
                      'my-event', 
                       array('text' => 'this is a notification'));*/
    event(new MyEvent('hello world'));
    return view('home');
});

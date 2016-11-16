<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//基础路由
Route::get('basic1', function () {
    return 'hello word';
});

Route::post('basic2', function () {
    return 'Basic2';
});

//多请求路由
Route::match(['get', 'post'], 'multy1', function () {
    return 'multy1';
});


//Route::any('multy2', function () {
//    return 'multy2';
//});

//路由参数
//Route::get('user/{id}',function($id){
//    return 'User-id-'.$id;
//});
//
//
//Route::get('user/{name?}',function($name='sean'){
//    return 'User-name-'.$name;
//});

//Route::get('user/{name?}',function($name='sean'){
//    return 'User-name-'.$name;
//})->where('name','[A-Za-z]+');

Route::get('user/{id}/{name?}', function ($id, $name = 'sean') {
    return 'User-id-' . $id . 'User-name-' . $name;
})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

//路由别名
//Route::get('user/member-center',['as'=>'center',function(){
//   return route('center');
//}]);

//路由群组
Route::group(['prefix' => 'member'], function () {
    Route::get('user/member-center', ['as' => 'center', function () {
        return route('center');
    }]);

    Route::any('multy2', function () {
        return 'member-multy2';
    });
});

//路由中输出试图
Route::get('view', function () {
    return view('welcome');
});

//关联控制器
//Route::get('member/info','MemberController@info');

//Route::get('member/info', ['uses' => 'MemberController@info']);
//Route::post('member/info', ['uses' => 'MemberController@info']);

//Route::any('member/info', [
//    'uses' => 'MemberController@info',
//    'as' => 'memberinfo'
//]);

//参数绑定
Route::any('member/{id}', ['uses' => 'MemberController@info'])->where('id', '[0-9]+');

//已经被废弃了
//Route::controller();

//db路由
//Route::any('student/{id}', ['uses' => 'StudentController@test']);

Route::any('query1', ['uses' => 'StudentController@query1']);
Route::any('query2', ['uses' => 'StudentController@query2']);
Route::any('query3', ['uses' => 'StudentController@query3']);
Route::any('query4', ['uses' => 'StudentController@query4']);
Route::any('request1', ['uses' => 'StudentController@request1']);

//活动页面
Route::group(['middleware' => ['activity']], function () {
    Route::any('activity1', ['uses' => 'StudentController@activity1']);
    Route::any('activity2', ['uses' => 'StudentController@activity2']);
});
//宣传页面
Route::any('activity0', ['uses' => 'StudentController@activity0']);


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF(xss) protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    Route::any('session1', ['uses' => 'StudentController@session1']);
    Route::any('session2', [
        'as' => 'session2',
        'uses' => 'StudentController@session2'
    ]);
    Route::any('response', ['uses' => 'StudentController@response']);

    Route::get('student/index', ['uses' => 'StudentController@index']);
    Route::any('student/create', ['uses' => 'StudentController@create']);
    Route::any('student/save', ['uses' => 'StudentController@save']);
});

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello Laravel[GET]!";
});


Route::match(['get', 'post'], 'hello', function () {
    return "Hello Laravel Request";
});

Route::match(['get', 'post'], '/testPost', function () {
    $csrf_token = csrf_token();

    $form = <<<FORM
        <form action="/testPost" method="POST">
            <input type="text" name="_token" value="{$csrf_token}">
            <input type="submit" value="Test"/>
        </form>
FORM;
    return $form;
});


/**
 * 带参数
 */
Route::any('/hello/{name}/{size}', function ($name, $size) {

    return 'hello: ' . $name . " size: $size";
});
/**
 * 带可选参数
 */
Route::any('hello2/{name?}', function ($name = 'Laravel') {
    return 'hello2 ' . $name;
});


//Route::get('/hello/Laravelacademy', ['as' => 'academy', function () {
//    return 'Hello LaravelAcademy';
//}]);
//
//
//Route::get('/testNamedRoute', function () {
//    return route('academy');
//});
//
//Route::get('/testNamedRoute2', function () {
//    return redirect()->route('academy');
//});


Route::get('/hello/Laravelacademy/{id}', ['as' => 'academy2', function ($id) {
    return 'Hello LaravelAcademy ' . $id . '！';
}]);


//Route::get("/testNamedRoute", function () {
//    return Redirect()->route('academy2', ['id' => 1]);
//});

///////group  组


Route::group(['as' => 'admin::'], function () {
    Route::get('dashboard', ['as' => 'dashboard', function () {
        return "admin :: dashboard";
    }]);
});


Route::get('/testNamedRoute', function () {
    return route('admin::dashboard');
});


Route::group(['middleware' => 'test'], function () {
    Route::get('/write/laravelacademy', function () {
        //使用Test中间件
    });
    Route::get('/update/laravelacademy', function () {
        //使用Test中间件
    });
});

Route::get('/age/refuse', ['as' => 'refuse', function () {
    return "未成年人禁止入内！";
}]);


Route::group(['domain' => '{service}.a.cn'], function () {
    Route::get('/write/laravelacademy', function ($service) {

    });
});


Route::resource('post', 'PostController');
Route::resource('post', 'PostController');
//Route::resource('request', 'Request2Controller');


Route::resource('test', 'TestController');
Route::controller('request', 'Request2Controller');


use Illuminate\Http\Response;

Route::get("testResponse", function () {
    $content = "Hell Laravel";

    $status = 401;
    $value = 'text/html;charset=utf-8';


    return (new Response($content, $status))->header('Content-type', $value);

    // return response($content, $status)->header('Content-Type', 'text/thml;charset=utf-8')->withCookie('site', 'baidu.com', 30, '/');
});


Route::get('testResponseView', function () {
    $value = 'text/html;charset=utf-8';
    return view('hello', ['message' => 'Hello LaravelAcademy']);
    return response()->view('hello', ['message' => 'Hello LaravelAcademy'])
        ->header('Content-Type', $value);
});


Route::get('testResponseJson',function(){
    return response()->json(['name'=>'LaravelAcademy','passwd'=>'LaravelAcademy.org']);
});
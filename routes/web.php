<?php

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

Route::group(['prefix'=>'task'],function (){
    Route::get('list', 'TaskController@getList');
    Route::get('add', 'TaskController@getAdd');
    Route::post('add', 'TaskController@postAdd');
    Route::get('edit/{id}', 'TaskController@getEdit');
    Route::post('edit/{id}', 'TaskController@postEdit');
    Route::get('delete/{id}', 'TaskController@getDelete');

    Route::get('taskdetail/{id}', 'TaskController@getDetail');

});
Route::group(['prefix'=>'taskchild'],function (){
    Route::get('list', 'TaskChildController@getList');
    Route::get('add', 'TaskChildController@getAdd');
    Route::post('add', 'TaskChildController@postAdd');
    Route::get('edit/{id}', 'TaskChildController@getEdit');
    Route::post('edit/{id}', 'TaskChildController@postEdit');
    Route::get('delete/{id}', 'TaskChildController@getDelete');

    Route::get('/{id}', 'TaskChildController@getTask');

    Route::get('add/{id}', 'TaskChildController@getAddByTask');
    Route::post('add/{id}', 'TaskChildController@postAddByTask');
});

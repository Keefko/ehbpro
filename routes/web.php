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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;


Route::resource('about', 'AboutController');
Route::resource('section', 'SectionController');
Route::resource('user', 'UserController');
Route::resource('list', 'ListController');
Route::resource('service', 'ServiceController');
Route::resource('page', 'PageController');
Route::resource('image', 'ImageController');
Route::resource('mail', 'MailController');


Route::get('/', function () {
    return view('home');
});



Route::post('/dashboard/menu/addcustommenu', array('as' => 'haddcustommenu', 'uses' => '\Harimayco\Menu\Controllers\MenuController@addcustommenu'));
Route::post('/dashboard/menu//deleteitemmenu', array('as' => 'hdeleteitemmenu', 'uses' => '\Harimayco\Menu\Controllers\MenuController@deleteitemmenu'));
Route::post('/dashboard/menu//deletemenug', array('as' => 'hdeletemenug', 'uses' => '\Harimayco\Menu\Controllers\MenuController@deletemenug'));
Route::post('/dashboard/menu//createnewmenu', array('as' => 'hcreatenewmenu', 'uses' => '\Harimayco\Menu\Controllers\MenuController@createnewmenu'));
Route::post('/dashboard/menu//generatemenucontrol', array('as' => 'hgeneratemenucontrol', 'uses' => '\Harimayco\Menu\Controllers\MenuController@generatemenucontrol'));
Route::post('/dashboard/menu//updateitem', array('as' => 'hupdateitem', 'uses' => '\Harimayco\Menu\Controllers\MenuController@updateitem'));



Route::post('partials._contact', 'MailController@postContact');

Route::get('/{$slug}','PageController@show');

Route::get('/dashboard',function (){
    return view('dashboard.index');
});

Route::get('/dashboard/page',function (){
    return view('dashboard.page');
});


Route::get('/dashboard/menu',function (){
    return view('dashboard.menu');
});

Route::get('/dashboard/list',function (){
    return view('dashboard.list');
});

Route::get('/dashboard/service',function (){
    return view('dashboard.service');
});

Route::get('/dashboard/service/create',function (){
    return view('dashboard.service.create');
});

Route::get('/dashboard/user',function (){
    return view('dashboard.user');
});

Route::get('/dashboard/user/create',function (){
    return view('dashboard.user.create');
});

Route::get('/dashboard/page/create',function (){
    return view('dashboard.page.create');
});

Route::get('/dashboard/list/create',function (){
    return view('dashboard.list.create');
});

Route::get('/dashboard/user/{{$user->id}}/edit',function (){
    return view('dashboard.user.edit');
});

Route::get('/dashboard/about/{{$about->id}}/edit', function (){
    return view('dashboard.about.edit');
});

Route::get('/dashboard/section/{{$section->id}}/edit', function (){
    return view('dashboard.section.edit');
});

Route::get('/dashboard/service/{{$service->id}}/edit', function (){
    return view('dashboard.service.edit');
});

Route::get('/dashboard/list/{{$list->id}}/edit', function (){
    return view('dashboard.list.edit');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});

Route::get('/dashboard/page/{{$page->id}}/edit', function (){
    return view('dashboard.page.edit');
});

Route::get('/dashboard/section/{{$section->id}}', function (){
    return view('dashboard.section.show');
});

Auth::routes(['register' => false]);


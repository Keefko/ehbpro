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

Route::resource('menu', 'MenuController');
Route::resource('about', 'AboutController');
Route::resource('section', 'SectionController');
Route::resource('user', 'UserController');
Route::resource('list', 'ListController');
Route::resource('service', 'ServiceController');
Route::resource('page', 'PageController');
Route::resource('image', 'ImageController');
Route::resource('mail', 'MailController');
Route::resource('submenu', 'SubmenuController');

Route::get('/', function () {
    return view('home');
});



Route::post('partials._contact', 'MailController@postContact');

Route::get('/{$slug}','PageController@show');

Route::get('/dashboard',function (){
    return view('dashboard.index');
});

Route::get('/dashboard/page',function (){
    return view('dashboard.page');
});

Route::get('/getSubmenu/{id}', 'MenuController@getSubmenu')->name('getSubmenu');


Route::get('/dashboard/menu',function (){
    return view('dashboard.menu');
});

Route::get('/dashboard/list',function (){
    return view('dashboard.list');
});

Route::get('/dashboard/service',function (){
    return view('dashboard.service');
});

Route::get('/dashboard/menu/create',function (){
    return view('dashboard.menu.create');
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

Route::get('/dashboard/menu/{{$menu->id}}/edit', function (){
    return view('dashboard.menu.edit');
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


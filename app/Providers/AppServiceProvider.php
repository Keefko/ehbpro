<?php

namespace App\Providers;

use App\About;
use App\Image;
use App\Mail;
use App\Menu;
use App\Page;
use App\Section;
use App\Lists;
use App\Service;
use App\Submenu;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('partials._menu', function ($view) {
            $view->with('menu', Menu::all());
        });

        view()->composer('partials._service', function ($view) {
            $view->with('section', Section::findOrFail(1));
        });

        view()->composer('partials._aditional', function ($view) {
            $view->with('imageAdd', Image::findOrFail(3));
        });

        view()->composer('dashboard.list', function ($view) {
            $view->with('image', Image::findOrFail(3));
        });

        view()->composer('partials._menu', function ($view) {
            $view->with('image', Image::findOrFail(1));
        });

        view()->composer('home', function ($view) {
            $view->with('image', Image::findOrFail(2));
        });


        view()->composer('dashboard.index', function ($view) {
            $view->with('logo', Image::findOrFail(1));
        });

        view()->composer('dashboard.index', function ($view) {
            $view->with('mails', Mail::all());
        });


        view()->composer('dashboard.index', function ($view) {
            $view->with('hero', Image::findOrFail(2));
        });


        view()->composer('partials._aditional', function ($view) {
            $view->with('section', Section::findOrFail(2));
        });


        view()->composer('partials._aditional', function ($view) {
            $view->with('list', Lists::all());
        });

        view()->composer('partials._contact', function ($view) {
            $view->with('section', Section::findOrFail(3));
        });

        view()->composer('partials._contact', function ($view) {
            $view->with('list', Lists::all());
        });

        view()->composer('dashboard.menu', function ($view) {
            $view->with('menu', Menu::all());
        });

        view()->composer('dashboard.user', function ($view) {
            $view->with('user', User::all());
        });

        view()->composer('dashboard.service', function ($view) {
            $view->with('service', Service::all());
        });

        view()->composer('partials._service', function ($view) {
            $view->with('service', Service::all());
        });

        view()->composer('partials._contact', function ($view) {
            $view->with('service', Service::all());
        });

        view()->composer('dashboard.list', function ($view) {
            $view->with('list', Lists::all());
        });

        view()->composer('dashboard.page', function ($view) {
            $view->with('page', Page::all());
        });


        view()->composer('dashboard.list', function ($view) {
            $view->with('section', Section::findOrFail(2));
        });

        view()->composer('dashboard.service', function ($view) {
            $view->with('section', Section::findOrFail(1));
        });

        view()->composer('partials._about', function ($view) {
            $view->with('about', About::findOrFail(1));
        });
    }
}

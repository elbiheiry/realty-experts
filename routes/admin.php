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

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::get('/login', ['as' => 'admin.login', 'uses' => 'LoginController@getLogin']);
        Route::post('/login', ['as' => 'admin.login', 'uses' => 'LoginController@postLogin']);
        Route::get('/logout', 'LoginController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'], function () {
        //dashboard route
        Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@getIndex']);

        /**
         * about routes
         */
        Route::group(['prefix' => 'about-us'], function () {
            Route::get('/', ['as' => 'admin.about', 'uses' => 'AboutController@getIndex']);
            Route::post('/edit', ['as' => 'admin.about.edit', 'uses' => 'AboutController@postEdit']);
        });

        /**
         * settings routes
         */
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/', ['as' => 'admin.settings', 'uses' => 'SettingController@getIndex']);
            Route::post('/edit', ['as' => 'admin.settings.edit', 'uses' => 'SettingController@postEdit']);
        });

        /**
         * categories routes
         */
        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', ['as' => 'admin.categories', 'uses' => 'CategoryController@getIndex']);
            Route::post('/', ['as' => 'admin.categories', 'uses' => 'CategoryController@postIndex']);
            Route::get('/edit/{id}', ['as' => 'admin.categories.edit', 'uses' => 'CategoryController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.categories.edit', 'uses' => 'CategoryController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.categories.delete', 'uses' => 'CategoryController@getDelete']);
        });

        /**
         * regions routes
         */
        Route::group(['prefix' => 'regions'], function () {
            Route::get('/', ['as' => 'admin.regions', 'uses' => 'RegionController@getIndex']);
            Route::post('/', ['as' => 'admin.regions', 'uses' => 'RegionController@postIndex']);
            Route::get('/edit/{id}', ['as' => 'admin.regions.edit', 'uses' => 'RegionController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.regions.edit', 'uses' => 'RegionController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.regions.delete', 'uses' => 'RegionController@getDelete']);
        });

        /**
         * gallery routes
         */
        Route::group(['prefix' => 'gallery'], function () {
            Route::get('/', ['as' => 'admin.gallery', 'uses' => 'GalleryController@getIndex']);
            Route::post('/', ['as' => 'admin.gallery', 'uses' => 'GalleryController@postIndex']);
            Route::get('/edit/{id}', ['as' => 'admin.gallery.edit', 'uses' => 'GalleryController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.gallery.edit', 'uses' => 'GalleryController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.gallery.delete', 'uses' => 'GalleryController@getDelete']);
        });

        /**
         * partners routes
         */
        Route::group(['prefix' => 'partners'], function () {
            Route::get('/', ['as' => 'admin.partners', 'uses' => 'PartnerController@getIndex']);
            Route::post('/', ['as' => 'admin.partners', 'uses' => 'PartnerController@postIndex']);
            Route::get('/edit/{id}', ['as' => 'admin.partners.edit', 'uses' => 'PartnerController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.partners.edit', 'uses' => 'PartnerController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.partners.delete', 'uses' => 'PartnerController@getDelete']);
        });

        /**
         * testimonials routes
         */
        Route::group(['prefix' => 'testimonials'], function () {
            Route::get('/', ['as' => 'admin.testimonials', 'uses' => 'TestimonialController@getIndex']);
            Route::post('/', ['as' => 'admin.testimonials', 'uses' => 'TestimonialController@postIndex']);
            Route::get('/edit/{id}', ['as' => 'admin.testimonials.edit', 'uses' => 'TestimonialController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.testimonials.edit', 'uses' => 'TestimonialController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.testimonials.delete', 'uses' => 'TestimonialController@getDelete']);
        });

        /**
         * members routes
         */
        Route::group(['prefix' => 'team'], function () {
            Route::get('/', ['as' => 'admin.members', 'uses' => 'MemberController@getIndex']);
            Route::post('/', ['as' => 'admin.members', 'uses' => 'MemberController@postIndex']);
            Route::get('/edit/{id}', ['as' => 'admin.members.edit', 'uses' => 'MemberController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.members.edit', 'uses' => 'MemberController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.members.delete', 'uses' => 'MemberController@getDelete']);

            /**
             * social links
             */
            Route::group(['prefix' => 'links'], function () {
                Route::get('/{id}', ['as' => 'admin.links', 'uses' => 'MemberLinkController@getIndex']);
                Route::post('/{id}', ['as' => 'admin.links', 'uses' => 'MemberLinkController@postIndex']);
            });
        });

        /**
         * messages routes
         */
        Route::group(['prefix' => 'messages'], function () {
            Route::get('/', ['as' => 'admin.messages', 'uses' => 'MessageController@getIndex']);
            Route::get('/{id}', ['as' => 'admin.messages.single', 'uses' => 'MessageController@getMessage']);
            Route::get('/delete/{id}', ['as' => 'admin.messages.delete', 'uses' => 'MessageController@getDelete']);
        });

        /**
         * subscribers routes
         */
        Route::group(['prefix' => 'subscribers'], function () {
            Route::get('/', ['as' => 'admin.subscribers', 'uses' => 'SubscriberController@getIndex']);
            Route::get('/delete/{id}', ['as' => 'admin.subscribers.delete', 'uses' => 'SubscriberController@getDelete']);
        });

        /**
         * home sections routes
         */
        Route::group(['prefix' => 'sections'], function () {
            Route::get('/', ['as' => 'admin.sections', 'uses' => 'HomeSectionController@getIndex']);
            Route::post('/', ['as' => 'admin.sections', 'uses' => 'HomeSectionController@postEdit']);
        });

        /**
         * projects routes
         */
        Route::group(['prefix' => 'projects'], function () {
            Route::get('/', ['as' => 'admin.projects', 'uses' => 'ProjectController@getIndex']);
            Route::post('/', ['as' => 'admin.projects', 'uses' => 'ProjectController@postIndex']);
            Route::get('/edit/{id}', ['as' => 'admin.projects.edit', 'uses' => 'ProjectController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.projects.edit', 'uses' => 'ProjectController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.projects.delete', 'uses' => 'ProjectController@getDelete']);

            /**
             * gallery routes
             */
            Route::group(['prefix' => 'images'], function () {
                Route::get('/{id}', ['as' => 'admin.projects.images', 'uses' => 'ProjectGalleryController@getIndex']);
                Route::post('/{id}', ['as' => 'admin.projects.images', 'uses' => 'ProjectGalleryController@postIndex']);
                Route::get('/edit/{id}', ['as' => 'admin.projects.images.edit', 'uses' => 'ProjectGalleryController@getEdit']);
                Route::post('/edit/{id}', ['as' => 'admin.projects.images.edit', 'uses' => 'ProjectGalleryController@postEdit']);
                Route::get('/delete/{id}', ['as' => 'admin.projects.images.delete', 'uses' => 'ProjectGalleryController@getDelete']);
            });
        });
    });
});
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

Route::group(['namespace' => 'Site' ,'middleware'=>'locale'], function () {

    /**
     * home routes
     */
    Route::get('/', ['as' => 'site.index', 'uses' => 'HomeController@getIndex']);
    Route::post('/subscribe', ['as' => 'site.subscribe', 'uses' => 'HomeController@postSubscribe']);

    /**
     * about routes
     */
    Route::get('/about-us', ['as' => 'site.about', 'uses' => 'AboutController@getIndex']);

    /**
     * contact-us routes
     */
    Route::get('/contact-us' , ['as' => 'site.contact' , 'uses' => 'ContactController@getIndex']);
    Route::post('/contact-us' , ['as' => 'site.contact' , 'uses' => 'ContactController@postIndex']);

    /**
     * partners routes
     */
    Route::get('/partners' , ['as' => 'site.partners' , 'uses' => 'PartnerController@getIndex']);

    /**
     * projects routes
     */
    Route::get('/projects' , ['as' => 'site.projects' , 'uses' => 'ProjectController@getIndex']);
    Route::get('/projects/{slug}' , ['as' => 'site.project' , 'uses' => 'ProjectController@getProject']);

    /**
     * team routes
     */
    Route::get('/team' , ['as' => 'site.team' , 'uses' => 'TeamController@getIndex']);

    Route::get('setlocale/{locale}',function($lang){
        \Illuminate\Support\Facades\Session::put('locale',$lang);
        return redirect()->back();
    })->name('site.locale');
});
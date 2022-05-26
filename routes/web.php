<?php

use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Support\Facades\Route;

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

    //ray(GitHub::rate_limit()->getResource('core')->getRemaining());
    //ray(GitHub::user()->show('mikewink'));
    //ray(GitHub::user()->repositories('mikewink'));

    /*
    dd(GitHub::rate_limit()->getResource('core')->getRemaining());
    dd(GitHub::user()->show('mikewink'));
    dd(GitHub::me()->repositories('owner', 'id', 'desc'));
    dd(GitHub::user()->repositories('mikewink'));
    dd(GitHub::current_user());
    dd(GitHub::gists()->all());
    */

    //return GitHub::repo()->show('mikewink', 'laravel-github-api');

    return view('welcome');
});

<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->post('auth/login', 'AuthController@login');
$router->post('auth/register', 'AuthController@register');
$router->post('auth/email/forgot', 'AuthController@forgotPassword');
$router->post('auth/email/reset/{token}', 'AuthController@resetPassword');
$router->get('auth/confirm/{token}', 'AuthController@confirm');
$router->post('auth/logout', 'AuthController@logout');
$router->post('auth/refresh', 'AuthController@refresh');
$router->get('account/profile/detail', 'AccountController@detailProfile');
$router->post('account/profile/update', 'AccountController@updateProfile');
$router->post('account/profile/upload', 'AccountController@uploadPicture');
$router->post('account/password/update', 'AccountController@updatePassword');
$router->get('page/ping', 'PageController@ping');
$router->get('page/home', 'PageController@home');
$router->get('page/about', 'PageController@about');
$router->get('page/service', 'PageController@service');
$router->get('page/faq', 'PageController@faq');
$router->get('page/contact', 'PageController@contact');
$router->post('page/message', 'PageController@message');
$router->post('page/subscribe', 'PageController@subscribe');
$router->get('page/file/{name}', 'PageController@file');
$router->get('portfolio/list', 'PortfolioController@list');
$router->get('portfolio/detail/{id}', 'PortfolioController@detail');
$router->get('article/list', 'ArticleController@list');
$router->get('article/detail/{slug}', 'ArticleController@detail');
$router->get('article/comment/list/{id}', 'ArticleController@listComment');
$router->post('article/comment/create/{id}', 'ArticleController@sendComment');

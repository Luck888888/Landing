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

//Группа маршрутов пользовательской части
//группа маршрутов будет обрабатываться посредниками веб. 2 параметр колбэк функция обрабатыващая роут
//Route::group(['middleware'=>'web'], function(){
//
//    //uses ячейка для хранения информации какой контроллер обработает запросы данные get and post
//    //для обработки 2 типов запросов:get / post
//    Route::match(['get','post'],'/',['uses'=>'IndexController@execute','as'=>'home']);
//
//    Route::get('/page/{alias}',['uses'=>'PageController@execute', 'as'=>'page']);
//
//    //для аутентификации.
//    Route::auth();
//
//});

//Модульная структура
$modules=config("modular.modules");
$path=config("modular.path");
$base_namespace=config("modular.base_namespace");

if($modules){
    foreach ($modules as $mod =>$submodules){
        foreach ($submodules as $key=> $sub){
            if(is_string($key)){
                $sub=$key;
            }

            $relativePath = "/".$mod ."/".$sub;
            $routesPath = $path .$relativePath. "/Routes/web.php";

            if(file_exists($routesPath)){
                Route::namespace("Modules\\$mod\\$sub\Controllers")->group($routesPath);
            }

        }
    }
}

//Группа маршрутов для админки
//Route::group(['prefix'=>'admin','middleware'=>'auth'],function() {
//
//    //главная страница админки,отображение
//    Route::get('/' , function () {
//
//        if(view()->exists('admin.index')){
//            $data= ['title'=>'Панель администратора'];
//            return view('admin.index', $data);
//        }
//    });
//
//
//    //для реализации конкретных действий/ admin/pages
//    Route::group(['prefix'=>'pages'], function() {
//
//        //admin/pages, главная страница
//        Route::get('/',['uses'=>'PagesController@execute', 'as'=>'pages']);
//
//        //добавление новых элементов в бд
//        //admin/pages/add
//        Route::match(['get','post'], '/add', ['uses'=>'PagesAddController@execute','as'=>'pagesAdd']);
//
//        //редактирование конкретной страницы
//        //admin/edit/2
//        Route::match(['get','post','delete'],'/edit/{page}',['uses'=>'PagesEditController@execute','as'=>'pagesEdit']);
//
//    });
//
//    //для реализации конкретных действий/ admin/portfolio
//    Route::group(['prefix'=>'portfolios'], function() {
//
//        //admin/pages главная страница
//        Route::get('/',['uses'=>'PortfolioController@execute', 'as'=>'portfolio']);
//
//        //добавление новых элементов в бд
//        //admin/pages/add
//        Route::match(['get','post'], '/add', ['uses'=>'PortfolioAddController@execute','as'=>'portfolioAdd']);
//
//        //редактирование конкретной страницы
//        //admin/edit/2
//        Route::match(['get','post','delete'],'/edit/{portfolio}',['uses'=>'PortfolioEditController@execute','as'=>'portfolioEdit']);
//
//    });
//
//    //для реализации конкретных действий/ admin/services
//    Route::group(['prefix'=>'services'], function() {
//
//        //admin/pages главная страница
//        Route::get('/',['uses'=>'ServiceController@execute', 'as'=>'services']);
//
//        //добавление новых элементов в бд
//        //admin/pages/add
//        Route::match(['get','post'], '/add', ['uses'=>'ServiceAddController@execute','as'=>'serviceAdd']);
//
//        //редактирование конкретной страницы
//        //admin/edit/2
//        Route::match(['get','post','delete'],'/edit/{service}',['uses'=>'ServiceEditController@execute','as'=>'serviceEdit']);
//
//    });
//
//
//});
//



//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

<?php

use Illuminate\Support\Facades\Route;

/*
php artisan make:controller AdminController :: tạo controller
php artisan make:model Category :: tạo bảng category
php artisan make:model Menu -m :: tạo bảng meunu có migration
php artisan migrate :: chạy file migrate
php artisan make:migration add_column_deleted_at_table_categories --table=categories
    tạo file migration để thêm cột delete_at vào bảng categories
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'App\Http\Controllers\AdminController@loginAdmin');
Route::post('/admin', 'App\Http\Controllers\AdminController@postLoginAdmin');

Route::get('/logout', [
    'as'=> 'admin.logout',
    'uses'=>'App\Http\Controllers\AdminController@logoutAdmin'
]);


Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/',[
            'as' =>'categories.index',
            'uses'=>'App\Http\Controllers\CategoryController@index',
            'middleware' => 'can:category-list',
        ]);
        Route::get('/create',[
            'as' =>'categories.create',
            'uses'=>'App\Http\Controllers\CategoryController@create',
            'middleware' => 'can:category-add',
        ]);
        Route::post('/store',[
            'as' =>'categories.store',
            'uses'=>'App\Http\Controllers\CategoryController@store',
        ]);
        Route::get('/edit/{id}',[
            'as' =>'categories.edit',
            'uses'=>'App\Http\Controllers\CategoryController@edit',
            'middleware' => 'can:category-edit',
        ]);
        Route::post('/update/{id}',[
            'as' =>'categories.update',
            'uses'=>'App\Http\Controllers\CategoryController@update',
        ]);
        Route::get('/delete/{id}',[
            'as' =>'categories.delete',
            'uses'=>'App\Http\Controllers\CategoryController@delete',
            'middleware' => 'can:category-delete',
        ]);
    });

    Route::prefix('menus')->group(function () {
        Route::get('/',[
            'as' =>'menus.index',
            'uses'=>'App\Http\Controllers\MenuController@index',
            'middleware' => 'can:menu-list',
        ]);
        Route::get('/create',[
            'as' =>'menus.create',
            'uses'=>'App\Http\Controllers\MenuController@create',
        ]);
        Route::post('/store',[
            'as' =>'menus.store',
            'uses'=>'App\Http\Controllers\MenuController@store',
        ]);
        Route::get('/edit/{id}',[
            'as' =>'menus.edit',
            'uses'=>'App\Http\Controllers\MenuController@edit',
        ]);
        Route::post('/update/{id}',[
            'as' =>'menus.update',
            'uses'=>'App\Http\Controllers\MenuController@update',
        ]);
        Route::get('/delete/{id}',[
            'as' =>'menus.delete',
            'uses'=>'App\Http\Controllers\MenuController@delete',
        ]);
    });



    Route::prefix('slider')->group(function (){
        Route::get('/',[
            'as' =>'slider.index',
            'uses'=>'App\Http\Controllers\SliderController@index',
        ]);
        Route::get('/create',[
            'as' =>'slider.create',
            'uses'=>'App\Http\Controllers\SliderController@create',
        ]);
        Route::post('/store',[
            'as' =>'slider.store',
            'uses'=>'App\Http\Controllers\SliderController@store',
        ]);
        Route::get('/edit/{id}',[
            'as' =>'slider.edit',
            'uses'=>'App\Http\Controllers\SliderController@edit',
        ]);
        Route::post('/update/{id}',[
            'as' =>'slider.update',
            'uses'=>'App\Http\Controllers\SliderController@update',
        ]);
        Route::get('/delete/{id}',[
            'as' =>'slider.delete',
            'uses'=>'App\Http\Controllers\SliderController@delete',
        ]);
    });

    Route::prefix('settings')->group(function (){
        Route::get('/',[
            'as' =>'settings.index',
            'uses'=>'App\Http\Controllers\AdminSettingsController@index',
        ]);
        Route::get('/create',[
            'as' =>'settings.create',
            'uses'=>'App\Http\Controllers\AdminSettingsController@create',
        ]);
        Route::post('/store',[
            'as' =>'settings.store',
            'uses'=>'App\Http\Controllers\AdminSettingsController@store',
        ]);
        Route::get('/edit/{id}',[
            'as' =>'settings.edit',
            'uses'=>'App\Http\Controllers\AdminSettingsController@edit',
        ]);
        Route::post('/update/{id}',[
            'as' =>'settings.update',
            'uses'=>'App\Http\Controllers\AdminSettingsController@update',
        ]);
        Route::get('/delete/{id}',[
            'as' =>'settings.delete',
            'uses'=>'App\Http\Controllers\AdminSettingsController@delete',
        ]);
    });

    Route::prefix('users')->group(function (){
        Route::get('/',[
            'as' =>'users.index',
            'uses'=>'App\Http\Controllers\AdminUsersController@index',
        ]);
        Route::get('/create',[
            'as' =>'users.create',
            'uses'=>'App\Http\Controllers\AdminUsersController@create',
        ]);
        Route::post('/store',[
            'as' =>'users.store',
            'uses'=>'App\Http\Controllers\AdminUsersController@store',
        ]);
        Route::get('/edit/{id}',[
            'as' =>'users.edit',
            'uses'=>'App\Http\Controllers\AdminUsersController@edit',
        ]);
        Route::post('/update/{id}',[
            'as' =>'users.update',
            'uses'=>'App\Http\Controllers\AdminUsersController@update',
        ]);
        Route::get('/delete/{id}',[
            'as' =>'users.delete',
            'uses'=>'App\Http\Controllers\AdminUsersController@delete',
        ]);
    });

    Route::prefix('roles')->group(function (){
        Route::get('/',[
            'as' =>'roles.index',
            'uses'=>'App\Http\Controllers\AdminRoleController@index',
        ]);
        Route::get('/create',[
            'as' =>'roles.create',
            'uses'=>'App\Http\Controllers\AdminRoleController@create',
        ]);
        Route::post('/store',[
            'as' =>'roles.store',
            'uses'=>'App\Http\Controllers\AdminRoleController@store',
        ]);
        Route::get('/edit/{id}',[
            'as' =>'roles.edit',
            'uses'=>'App\Http\Controllers\AdminRoleController@edit',
        ]);
        Route::post('/update/{id}',[
            'as' =>'roles.update',
            'uses'=>'App\Http\Controllers\AdminRoleController@update',
        ]);
        Route::get('/delete/{id}',[
            'as' =>'roles.delete',
            'uses'=>'App\Http\Controllers\AdminRoleController@delete',
        ]);
    });

    Route::prefix('permissions')->group(function (){
        Route::get('/create',[
            'as' =>'permissions.create',
            'uses'=>'App\Http\Controllers\AdminPermissionController@createPermisssion',
        ]);
        Route::post('/store',[
            'as' =>'permissions.store',
            'uses'=>'App\Http\Controllers\AdminPermissionController@store',
        ]);
    });
});



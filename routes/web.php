<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');

    Route::resource('products', 'ProductsController');

    Route::delete('sdm_category/destroy', 'SdmCategoryController@massDestroy')->name('sdm_category.massDestroy');

    Route::resource('sdm_category', 'SdmCategoryController');

    Route::delete('master_agama/destroy', 'MasterAgamaController@massDestroy')->name('master_agama.massDestroy');

    Route::resource('master_agama', 'MasterAgamaController');

    Route::delete('master_pekerjaan/destroy', 'MasterPekerjaanController@massDestroy')->name('master_pekerjaan.massDestroy');

    Route::resource('master_pekerjaan', 'MasterPekerjaanController');

    Route::delete('master_gaji/destroy', 'MasterGajiController@massDestroy')->name('master_gaji.massDestroy');

    Route::resource('master_gaji', 'MasterGajiController');
});

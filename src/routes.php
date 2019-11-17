<?php

Route::group(['middleware' => ['web', 'auth']], function() {

    Route::get( '/yabe', 'moltox\yabe\Controllers\YabeController@index' )->name('yabe');

    Route::resource('/yabe/users', 'moltox\yabe\Controllers\UserController')->names([
        'index' => 'y_users.index',
        'store' => 'y_users.store',
        'create' => 'y_users.create',
        'show' => 'y_users.show',
        'update' => 'y_users.update',
        'destroy' => 'y_users.destroy',
        'edit' => 'y_users.edit'
    ]);

});

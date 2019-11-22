<?php

Route::group( [ 'middleware' => [ 'web', 'auth' ],
    'prefix' => '/yabe' ], function () {

    Route::get( '/', 'moltox\yabe\Http\Controllers\YabeController@index' )->name( 'yabe' );

    Route::get( '/user/{user}/addpermission/{permission}', 'moltox\yabe\Http\Controllers\UserController@addDirectPermission' )->name( 'addDirectPermissionToUser' );

    Route::get( '/user/{user}/removepermission/{permission}', 'moltox\yabe\Http\Controllers\UserController@removeDirectPermission' )->name( 'removeDirectPermissionToUser' );

    Route::get( '/user/{user}/addrole/{role}', 'moltox\yabe\Http\Controllers\UserController@addRole' )->name( 'addRoleToUser' );

    Route::get( '/user/{user}/removerole/{role}', 'moltox\yabe\Http\Controllers\UserController@removeRole' )->name( 'removeRoleFromUser' );

    Route::patch('/user/{user}/changepassword', 'moltox\yabe\Http\Controllers\UserController@changePassword')->name('changePasswordForUser');

    Route::resource( '/users', 'moltox\yabe\Http\Controllers\UserController' )->names( [
        'index' => 'y_users.index',
        'store' => 'y_users.store',
        'create' => 'y_users.create',
        'show' => 'y_users.show',
        'update' => 'y_users.update',
        'destroy' => 'y_users.destroy',
        'edit' => 'y_users.edit'
    ] );



} );

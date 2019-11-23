<?php

Route::group( [ 'middleware' => [ 'web', 'auth' ],
    'prefix' => '/yabe' ], function () {

    Route::get( '/', 'moltox\yabe\Http\Controllers\YabeController@index' )->name( 'yabe' );

    Route::get( '/user/{user}/addpermission/{permission}', 'moltox\yabe\Http\Controllers\UserController@addDirectPermission' )->name( 'addDirectPermissionToUser' );

    Route::get( '/user/{user}/removepermission/{permission}', 'moltox\yabe\Http\Controllers\UserController@removeDirectPermission' )->name( 'removeDirectPermissionToUser' );

    Route::get( '/user/{user}/addrole/{role}', 'moltox\yabe\Http\Controllers\UserController@addRole' )->name( 'addRoleToUser' );

    Route::get( '/user/{user}/removerole/{role}', 'moltox\yabe\Http\Controllers\UserController@removeRole' )->name( 'removeRoleFromUser' );

    Route::patch( '/user/{user}/changepassword', 'moltox\yabe\Http\Controllers\UserController@changePassword' )->name( 'changePasswordForUser' );

    Route::resource( '/users', 'moltox\yabe\Http\Controllers\UserController' )->names( [
        'index' => 'y_users.index',
        'store' => 'y_users.store',
        'create' => 'y_users.create',
        'show' => 'y_users.show',
        'update' => 'y_users.update',
        'destroy' => 'y_users.destroy',
        'edit' => 'y_users.edit'
    ] )->except(['create']);

    Route::get( '/roles/{role}/givepermission/{permission}', 'moltox\yabe\Http\Controllers\RoleController@givePermissionTo' )->name( 'giveRolePermissionTo' );

    Route::get( '/roles/{role}/removepermission/{permission}', 'moltox\yabe\Http\Controllers\RoleController@removePermissionTo' )->name( 'removePermissionFromRole' );

    Route::get( '/roles/{role}/adduser{user}', 'moltox\yabe\Http\Controllers\RoleController@addUser' )->name( 'addUserToRole' );

    Route::get( '/roles/{role}/removeuser/{user}', 'moltox\yabe\Http\Controllers\RoleController@removeUser' )->name( 'removeUserFromRole' );

    Route::resource( '/roles', 'moltox\yabe\Http\Controllers\RoleController' )->names( [
        'index' => 'y_roles.index',
        'store' => 'y_roles.store',
        'update' => 'y_roles.update',
        'destroy' => 'y_roles.destroy',
        'edit' => 'y_roles.edit'
    ] )->except(  [ 'create', 'show' ]  );

    Route::get( '/permissions/{permission}/addtorole/{role}', 'moltox\yabe\Http\Controllers\PermissionController@addToRole' )->name( 'addPermissionToRole' );

    Route::get( '/permissions/{permission}/removefromrole/{role}', 'moltox\yabe\Http\Controllers\PermissionController@removeFromRole' )->name( 'revokePermissionFromRole' );

    Route::resource( '/permissions', 'moltox\yabe\Http\Controllers\PermissionController' )->names( [
        'index' => 'y_permissions.index',
        'store' => 'y_permissions.store',
        'update' => 'y_permissions.update',
        'destroy' => 'y_permissions.destroy',
        'edit' => 'y_permissions.edit'
    ] )->except( [ 'create', 'show' ] );

} );

<?php

// Yabe Home
Breadcrumbs::for( 'yabe', function ( $trail ) {

    $trail->push( 'Yabe', route( 'yabe' ) );

} );

Breadcrumbs::for( 'y_users.index', function ( $trail ) {

    $trail->parent( 'yabe' );
    $trail->push( Str::plural( __( 'words.User' ) ), route( 'y_users.index' ) );

} );

Breadcrumbs::for( 'y_users.show', function ( $trail, $user ) {

    $modelClass = config( 'yabe.user_model_path' );
    $mUser = new $modelClass;

    $mUser = $mUser->findOrFail( $user );

    $trail->parent( 'y_users.index' );
    $trail->push( $mUser->name, route( 'y_users.show', [ 'user' => $mUser ] ) );

} );

Breadcrumbs::for( 'y_users.edit', function ( $trail, $user ) {

    $modelClass = config( 'yabe.user_model_path' );
    $mUser = new $modelClass;

    $mUser = $mUser->findOrFail( $user );

    $trail->parent( 'y_users.show', $user );
    $trail->push( Str::title( __( 'yabe::words.edit' ) ), route( 'y_users.edit', [ 'user' => $mUser ] ) );

} );


Breadcrumbs::for( 'y_permissions.index', function ( $trail ) {

    $trail->parent( 'yabe' );
    $trail->push( Str::title( Str::plural( __( 'yabe::words.permission' ) ) ), route( 'y_permissions.index' ) );

} );

Breadcrumbs::for( 'y_permissions.edit', function ( $trail, $permission ) {


    $permission = Spatie\Permission\Models\Permission::findOrFail( $permission );

    $trail->parent( 'y_permissions.index' );

    $trail->push( $permission->name, route( 'y_users.edit', [ 'permission' => $permission ] ) );

} );


Breadcrumbs::for( 'y_roles.index', function ( $trail ) {

    $trail->parent( 'yabe' );
    $trail->push( Str::title( Str::plural( __( 'yabe::words.role' ) ) ), route( 'y_roles.index' ) );

} );

Breadcrumbs::for( 'y_roles.edit', function ( $trail, $role ) {

    $role = Spatie\Permission\Models\Role::findOrFail( $role->id );

    $trail->parent( 'y_roles.index' );

    $trail->push( $role->name, route( 'y_users.edit', [ 'role' => $role ] ) );

} );



Breadcrumbs::for( 'y_menus.index', function ( $trail ) {

    $trail->parent( 'yabe' );
    $trail->push( Str::title( Str::plural( __( 'yabe::words.menu' ) ) ), route( 'y_menus.index' ) );

} );


Breadcrumbs::for( 'y_menus.edit', function ( $trail, $menu ) {

    $menu = \moltox\yabe\Menu::findOrFail( $menu->id );

    $trail->parent( 'y_menus.index' );

    $trail->push( $menu->name, route( 'y_menus.edit', [ 'menu' => $menu ] ) );

} );

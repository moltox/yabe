<?php


// Yabe Home
Breadcrumbs::for('yabe', function ($trail) {

    $trail->push('Yabe', route('yabe'));

});

Breadcrumbs::for('y_users.index', function ($trail)  {

    $trail->parent('yabe');
    $trail->push('Users', route('y_users.index'));

});

Breadcrumbs::for('y_users.show', function ($trail, $user)  {

    $modelClass = config('yabe.user_model_path');
    $mUser = new $modelClass;

    $mUser = $mUser->findOrFail($user);

    $trail->parent('y_users.index');
    $trail->push($mUser->name, route('y_users.show', ['user'=>$mUser]));

});

Breadcrumbs::for('y_users.edit', function ($trail, $user)  {

    $modelClass = config('yabe.user_model_path');
    $mUser = new $modelClass;

    $mUser = $mUser->findOrFail($user);

    $trail->parent('y_users.show', $user);
    $trail->push('Edit', route('y_users.edit', ['user'=>$mUser]));

});


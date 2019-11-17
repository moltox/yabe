<?php

namespace moltox\yabe\Repositories;


use Illuminate\Http\Request;

class UsersRepository {

    protected $user;

    public function __construct() {

        $class = config( 'yabe.user_model_path' );

        $this->user = new $class;

    }

    public function index() {

        return $this->user->select('*');

    }

    public function show( $id ) {

        return $this->user->find( $id );

    }

    public function destroy( $id ) {

        $user = $this->user->find( $id );

        return $user->delete();

    }

    public function update( $id, $request ) {

        // TODO add password check
        $user = $this->user->find( $id );

        $user->update( $request->all() );

        $user->save();

        return $user;

    }

}

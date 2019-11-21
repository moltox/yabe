<?php

namespace moltox\yabe\Repositories;


class UsersRepository extends AbstractRepository {

    protected $user;

    public function __construct() {

        $userClass = config( 'yabe.user_model_path' );
// TODO manage this by middleware or something like this
        $this->user = new $userClass;

        parent::__construct( $this->user );

    }

    public function index() {

        return $this->user->select('*');

    }

    public function show( $id ) {

        return $this->user->find( $id );

    }




}

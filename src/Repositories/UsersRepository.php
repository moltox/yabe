<?php

namespace moltox\yabe\Repositories;


use Illuminate\Http\Request;

use moltox\yabe\Repositories\CustomFieldRepository;

class UsersRepository {

    protected $user;

    protected $customFieldRepository;

    public function __construct( CustomFieldRepository $customFieldRepository ) {

        $class = config( 'yabe.user_model_path' );

        $this->user = new $class;

        $this->customFieldRepository = $customFieldRepository;

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

        $parsedCustomFields = $this->getParsedCustomFieldsFromRequest( $request );

        $cfr = $this->customFieldRepository;

        $user = $cfr->update( $user, $parsedCustomFields );

        $user->save();

        return $user;

    }

    private function getParsedCustomFieldsFromRequest( $request ) {

        $data = $request->all();

        $parsedData = [];

        foreach ($data as $idx => $value)  {

            if ( strpos( $idx, 'cf_'))  {

                $fieldName = explode('cf__', $idx)[1];

                $parsedData[$fieldName] = $value;

            }

        }

        return $parsedData;

    }

}

<?php

namespace moltox\yabe\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use moltox\yabe\Helper\CustomFieldHelper;
use moltox\yabe\Repositories\UsersRepository;



class PermissionController extends Controller {

    /**
     * @var UsersRepository $usersRepository
     */
    protected $usersRepository;

    /**
     * @var CustomFieldHelper $customFieldHelper
     */
    protected $customFieldHelper;

    protected $user;

    protected $userClass;

    public function __construct( UsersRepository $usersRepository, CustomFieldHelper $customFieldHelper ) {

        parent::__construct( $customFieldHelper );

        $this->customFieldHelper = $customFieldHelper;

        $this->usersRepository = $usersRepository;

        $class =  config('yabe.user_model_path');

        $this->userClass = $class;

        $this->user = new $class;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {





    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {



    }


}

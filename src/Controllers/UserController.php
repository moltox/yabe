<?php

namespace moltox\yabe\Controllers;

use Cassandra\Custom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use moltox\yabe\Helper\CustomFieldHelper;
use moltox\yabe\Repositories\UsersRepository;



class UserController extends Controller {

    /**
     * @var UsersRepository $usersRepository
     */
    protected $usersRepository;

    /**
     * @var CustomFieldHelper $customFieldHelper
     */
    protected $customFieldHelper;

    protected $user;

    public function __construct( UsersRepository $usersRepository, CustomFieldHelper $customFieldHelper ) {

        $this->customFieldHelper = $customFieldHelper;

        $this->usersRepository = $usersRepository;

        $class =  config('yabe.user_model_path');

        $this->user = new $class;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $users = $this->usersRepository->index();

        $users = $users->paginate( 10 );

        $customFields = config('custom_fields.User');

        return view( 'yabe::users.index', compact( 'users', 'customFields' ) );
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

        $user = $this->usersRepository->show( $id );

        $customFields = config('custom_fields.User');

        return view( 'yabe::users.show', compact( 'user', 'customFields' ) );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {

        $user = $this->usersRepository->show( $id );

        $customFields = config('custom_fields.User');

        return view( 'yabe::users.edit', compact( 'user', 'customFields' ) );

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

        $cfh = $this->customFieldHelper;

        $rules = array(

            'name' => 'required|min:3|max:255',
            'email' => 'required|email',

        );

        $rules = $cfh->getModelsValidationRules( $this->user, $rules );

        $this->validate( $request, $rules );

        $user = $this->usersRepository->update( $id, $request );

        return redirect( route( 'y_users.show', [ 'user' => $user ] ) );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {

        $this->usersRepository->destroy( $id );

        return redirect( route( 'y_users.index' ) );

    }

}

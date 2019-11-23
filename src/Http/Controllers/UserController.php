<?php

namespace moltox\yabe\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use moltox\yabe\Helper\CustomFieldHelper;
use moltox\yabe\Repositories\UsersRepository;


class UserController extends AbstractController {

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

        $this->middleware( 'permission:grant user list', [ 'only' => [ 'index' ] ] ); //List Permission
        $this->middleware( 'permission:grant user create', [ 'only' => [ 'create', 'store' ] ] ); //Create Permission
        $this->middleware( 'permission:grant user edit', [ 'only' => [ 'edit', 'update' ] ] ); //Update Permission
        $this->middleware( 'permission:grant user delete', [ 'only' => [ 'destroy' ] ] ); //Delete Permission
        $this->middleware( 'permission:grant user give permission', [ 'only' => [ 'addDirectPermission' ] ] );
        $this->middleware( 'permission:grant user remove permission', [ 'only' => [ 'removeDirectPermission' ] ] );
        $this->middleware( 'permission:grant user give role', [ 'only' => [ 'addDirectPermission' ] ] );
        $this->middleware( 'permission:grant user remove role', [ 'only' => [ 'removeDirectPermission' ] ] );
        $this->middleware( 'permission:grant user change password', [ 'only' => [ 'removeDirectPermission' ] ] );

        $this->customFieldHelper = $customFieldHelper;

        $this->usersRepository = $usersRepository;

        $class = config( 'yabe.user_model_path' );

        $this->userClass = $class;

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

        $customFields = config( 'custom_fields.User' );

        return view( 'yabe::users.index', compact( 'users', 'customFields' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {

        $passwordRegexPattern = '^\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^';

        $validated = $this->validate( $request, [

            'name' => 'required|min:3|max:25',
            'email' => 'email|unique:users,email|max:35',
            'password' => 'min:8|max:255|regex:' . $passwordRegexPattern,

        ]);

        $user = $this->usersRepository->create( $request );

        return redirect( route( 'y_users.edit', [ 'user' => $user ] ) );

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

        $customFields = config( 'custom_fields.User' );

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

        $customFields = config( 'custom_fields.User' );

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

    public function addDirectPermission( $user, $permission ) {

        $this->usersRepository->givePermission( $user, $permission );

        return redirect( route( 'y_users.edit', [ 'user' => $user ] ) );

    }

    public function removeDirectPermission( $user, $permission ) {

        $this->usersRepository->removePermission( $user, $permission );

        return redirect( route( 'y_users.edit', [ 'user' => $user ] ) );

    }

    public function addRole( $user, $role ) {

        $this->usersRepository->giveRole( $user, $role );

        return redirect( route( 'y_users.edit', [ 'user' => $user ] ) );

    }

    public function removeRole( $user, $role ) {

        $this->usersRepository->removeRole( $user, $role );

        return redirect( route( 'y_users.edit', [ 'user' => $user ] ) );

    }

    public function changePassword( Request $request, $user ) {

        $validated = $this->validate( $request, [
            'password' => 'confirmed|min:6|max:255',

        ] );

        $this->usersRepository->changePassword( $user, $request['password']);

        return redirect( route( 'y_users.edit', [ 'user' => $user ] ) );

    }

}

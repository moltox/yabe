<?php

namespace moltox\yabe\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use moltox\yabe\Helper\CustomFieldHelper;
use moltox\yabe\Repositories\UsersRepository;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends Controller {

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

    public function __construct( UsersRepository $usersRepository ) {

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

        $roles = Role::select( '*' )->orderBy( 'name', 'asc' )->paginate( 10 );

        return view( 'yabe::roles.index', compact( 'roles' ) );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store( Request $request ) {

        $validated = $this->validate( $request, [

            'name' => 'required|min:3|max:25',
            'guard_name' => 'min:2|max:12',

        ] );

        Role::create( $validated );

        return redirect( route( 'y_roles.index' ) );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( Role $role ) {

        $users = $this->user->all();

        $roles = Role::select( '*' )->orderBy( 'name', 'asc' )->paginate( 10 );

        return view( 'yabe::roles.index', compact( 'role', 'roles', 'users' ) );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Permission               $permission
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update( Request $request, Role $role ) {

        $validated = $this->validate( $request, [

            'name' => 'required|min:3|max:25',
            'guard_name' => 'min:2|max:12',

        ] );

        $role->update( $validated );

        $role->save();

        return redirect( route( 'y_roles.index' ) );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy( Role $role ) {

        $role->delete();

        return redirect( route( 'y_roles.index' ) );

    }

    public function givePermissionTo( Request $request, Role $role, Permission $permission ) {

        $role->givePermissionTo( $permission );

        return redirect( route( 'y_roles.edit', [ 'role' => $role ] ) );

    }

    public function removePermissionTo( Request $request, Role $role, Permission $permission ) {

        $role->revokePermissionTo( $permission );

        return redirect( route( 'y_roles.edit', [ 'role' => $role ] ) );

    }

    public function addUser( Role $role, $user ) {

        dd( $user );

    }

    public function removeUser( Role $role, $user ) {

        $user = $this->user->find ( $user );

        $user->removeRole( $role );

        return redirect( route( 'y_roles.edit', [ 'role' => $role ] ) );

    }

}

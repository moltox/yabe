<?php

namespace moltox\yabe\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use moltox\yabe\Helper\CustomFieldHelper;
use moltox\yabe\Repositories\UsersRepository;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


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

    public function __construct( UsersRepository $usersRepository ) {

        $this->middleware( 'permission:grant permission list', [ 'only' => [ 'index' ] ] ); //List Permission
        $this->middleware( 'permission:grant permission create', [ 'only' => [ 'create', 'store' ] ] ); //Create Permission
        $this->middleware( 'permission:grant permission edit', [ 'only' => [ 'edit', 'update' ] ] ); //Update Permission
        $this->middleware( 'permission:grant permission delete', [ 'only' => [ 'destroy' ] ] ); //Delete Permission
        $this->middleware( 'permission:grant permission add to role', [ 'only' => [ 'addToRole' ] ] );
        $this->middleware( 'permission:grant permission remove from role', [ 'only' => [ 'removeFromRole' ] ] );

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

        $permissions = Permission::select( '*' )->orderBy( 'name', 'asc' )->paginate( 10 );

        return view( 'yabe::permissions.index', compact( 'permissions' ) );

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

            'name' => 'required|min:8|max:25',
            'guard_name' => 'min:2|max:12',

        ] );

        Permission::create( $validated );

        return redirect( route( 'y_permissions.index' ) );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {

        $permission = Permission::find( $id );

        $permissions = Permission::select( '*' )->orderBy( 'name', 'asc' )->paginate( 10 );

        return view( 'yabe::permissions.index', compact( 'permission', 'permissions' ) );

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
    public function update( Request $request, Permission $permission ) {

        $validated = $this->validate( $request, [

            'name' => 'required|min:8|max:25',
            'guard_name' => 'min:2|max:12',

        ] );

        $permission->update( $validated );

        $permission->save();

        return redirect( route( 'y_permissions.index' ) );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy( Permission $permission ) {

        $permission->delete();

        return redirect( route( 'y_permissions.index' ) );

    }

    public function addToRole( Request $request, Permission $permission, Role $role ) {

        $permission->assignRole( $role );

        return redirect( route( 'y_permissions.edit', ['permission' => $permission] ) );

    }

    public function removeFromRole( Request $request, Permission $permission, Role $role ) {

        $permission->removeRole( $role );

        return redirect( route( 'y_permissions.edit', ['permission' => $permission] ) );

    }


}

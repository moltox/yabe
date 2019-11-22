<?php

namespace moltox\yabe\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use moltox\yabe\Helper\CustomFieldHelper;
use moltox\yabe\Repositories\UsersRepository;
use Spatie\Permission\Models\Permission;


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

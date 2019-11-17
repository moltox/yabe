<?php

namespace moltox\yabe\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use moltox\yabe\Repositories\UsersRepository;


class UserController extends Controller {

    protected $usersRepository;

    public function __construct( UsersRepository $usersRepository ) {

        $this->usersRepository = $usersRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $users = $this->usersRepository->index();

        $users = $users->paginate( 10 );

        return view( 'yabe::users.index', compact( 'users' ) );
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

        return view( 'yabe::users.show', compact( 'user' ) );

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

        return view( 'yabe::users.edit', compact( 'user' ) );

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

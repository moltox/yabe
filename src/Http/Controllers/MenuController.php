<?php

namespace moltox\yabe\Http\Controllers;

use moltox\yabe\Menu;
use Illuminate\Http\Request;
use moltox\yabe\Helper\CustomFieldHelper;
use moltox\yabe\Repositories\MenusRepository;

class MenuController extends AbstractController {

    /**
     * @var MenusRepository $menusRepository
     */
    protected $menusRepository;

    public function __construct( CustomFieldHelper $customFieldHelper, MenusRepository $menusRepository ) {

        $this->menusRepository = $menusRepository;

        parent::__construct( $customFieldHelper );


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ) {

        $contexts = $this->menusRepository->getContexts()->get()->toArray();

        $context = $request->has( 'context' ) ? $request[ 'context' ] : '';

        $menus = $this->menusRepository->indexTable( $context )->get();

        return view( 'yabe::menus.index', compact( 'menus', 'contexts', 'context' ) );

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {

        $this->checkBoxMerge( $request, 'active' );

        $this->checkBoxMerge( $request, 'parent' );

        $validated = $this->validate( $request, [

            'name' => 'max:15',
            'title' => 'max:255',
            'context' => 'required',

        ] );


        $menu = $this->menusRepository->create( $request );

        return redirect( route( 'y_menus.edit', [ 'menu' => $menu ] ) );
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Menu $menu
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request, Menu $menu ) {

        $contexts = $this->menusRepository->getContexts()->get()->toArray();

        $context = $request->has( 'context' ) ? $request[ 'context' ] : '';

        $menus = $this->menusRepository->indexTable( $context )->get();
//dd($menus);
        $parents = $this->menusRepository->getAllParents();

        return view( 'yabe::menus.index', compact( 'menus', 'contexts', 'context', 'menu', 'parents' ) );

    }

    /**
     * @param Request $request
     * @param Menu    $menu
     */
    public function update( Request $request, Menu $menu ) {

        $this->checkBoxMerge( $request, 'active' );

        $this->checkBoxMerge( $request, 'parent' );

        $validated = $this->validate( $request, [

            'name' => 'max:15',
            'title' => 'max:255',
            'context' => 'required',

        ] );

        $this->menusRepository->update( $menu->id, $request );

        return redirect( route( 'y_menus.edit', [ 'menu' => $menu ] ) );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Menu $menu
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( Menu $menu ) {
        //
    }

    public function moveUp( Request $request, Menu $menu ) {

        $this->menusRepository->moveUp( $menu );

        return redirect( route( 'y_menus.edit', [ 'menu' => $menu ] ) );

    }

    public function moveDown(  Request $request, Menu $menu ) {

        $this->menusRepository->moveDown( $menu );

        return redirect( route( 'y_menus.edit', [ 'menu' => $menu ] ) );

    }

}

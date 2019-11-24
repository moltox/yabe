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
    public function index(Request $request) {

        $contexts = $this->menusRepository->getContexts()->get()->toArray();

        $context = $request->has('context') ? $request['context'] : '';

        $menus = $this->menusRepository->all( $context )->get();

        return view( 'yabe::menus.index', compact('menus', 'contexts', 'context') );

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
     * Show the form for editing the specified resource.
     *
     * @param Menu $menu
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request, Menu $menu ) {

        $contexts = $this->menusRepository->getContexts()->get()->toArray();

        $context = $request->has('context') ? $request['context'] : '';

        $menus = $this->menusRepository->all( $context )->get();

        return view( 'yabe::menus.index', compact('menus', 'contexts', 'context', 'menu') );

    }

    /**
     * @param Request $request
     * @param Menu    $menu
     */
    public function update( Request $request, Menu $menu ) {
        //
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

}

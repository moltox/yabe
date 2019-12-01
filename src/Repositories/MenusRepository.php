<?php


namespace moltox\yabe\Repositories;


use Illuminate\Http\Request;
use moltox\yabe\Menu;
use Illuminate\Support\Facades\Log;


class MenusRepository extends AbstractRepository {

    public function __construct( Menu $menu ) {

        parent::__construct( $menu );

    }

    public function create( Request $request ) {

        $sequence = $this->model->where( 'parent_id', $request[ 'parent_id' ] )->max( 'sequence' ) + 1;

        $request->merge( [ 'sequence' => $sequence ] );

        $menu = $this->model->create( $request->toArray() );

        $menu->save();

        return $menu;

    }

    public function all( $context = '', $showRoot = false ) {

        $query = $this->model->select( '*' );

        if ( $context != '' ) $query = $query->where( 'context', $context );

        if ( !$showRoot ) $query = $query->where( 'name', '!=', 'root' );

        $query->orderBy( 'context', 'asc' )
            ->orderBy( 'sequence', 'asc' );

        return $query;

    }

    public function indexTable( $context = '' ) {

        return $this->all( $context, false )->where( 'parent_id', 1 );

    }

    public function forNavbarView( $context = 'yabe' ) {

        $menus = $this->model->select( '*' )
            ->where( 'active', true )
            ->where( 'context', $context )
            ->where( 'parent_id', 1 )
            ->orderBy( 'sequence', 'asc' );

        return $menus->get();

    }

    public function getContexts() {

        return $this->model->select( 'context' )
            ->groupBy( 'context' )
            ->orderBy( 'context', 'asc' );

    }

    public function getAllParents() {

        $query = $this->model->select( '*' )
            ->where( function ( $query ) {

                $query->where( 'active', true )
                    ->where( 'parent', true );

            } )
            ->orWhere( 'id', 1 )  // also get root, although it's not active
            ->orderBy( 'sequence', 'asc' );

        return $query->get();
    }

    public function moveUp( Menu $menu ) {

        $nextMenu = $this->getNextPossibleMenu( $menu, true );

        if ( $nextMenu == null ) return null;

        $this->swapMenus( $nextMenu, $menu );

    }

    public function moveDown( Menu $menu ) {


        $nextMenu = $this->getNextPossibleMenu( $menu, false );

        if ( $nextMenu == null ) return null;

        $this->swapMenus( $menu, $nextMenu );

    }

    private function swapMenus( $menu1, $menu2 ) {

        Log::info( 'Swapping ' . $menu1->name . ' with sequence ' . $menu1->sequence . ' with ' .
            $menu2->name . ' with sequence ' . $menu2->sequence );

        $tempSequence = $menu1->sequence;

        $menu1->sequence = $menu2->sequence;

        $menu2->sequence = $tempSequence;

        $menu1->save();

        $menu2->save();

    }


    /**
     * @param Menu $menu
     * @param bool $moveUp
     *
     * @return Menu|null
     *
     * Function to lookup the next possible menu to swap with
     * in this function are all security checks (bounds etc )
     *
     */
    private function getNextPossibleMenu( Menu $menu, $moveUp = true ) {

        $query = $this->model->where( 'parent_id', $menu->parent_id )
            ->orderBy( 'sequence', 'asc' );

        if ( $moveUp ) {

            $query = $query->where( 'sequence', '<', $menu->sequence );

            $menus = $query->get()->last();

        } else {

            $query = $query->where( 'sequence', '>', $menu->sequence );

            $menus = $query->get()->first();
        }

        return $menus;

    }

}

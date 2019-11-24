<?php


namespace moltox\yabe\Repositories;


use moltox\yabe\Menu;

class MenusRepository extends AbstractRepository {

    public function __construct( Menu $menu ) {

        parent::__construct( $menu );

    }

    public function all( $context = '' ) {

        $query = $this->model->select( '*' );

        if ( $context != '' ) $query = $query->where( 'context', $context );

        $query->orderBy( 'context', 'asc' )
              ->orderBy( 'sequence', 'asc' );

        return $query;

    }

    public function forNavbarView( $context = 'yabe' ) {

        $menus = $this->model->select( '*' )
            ->where( 'active', true )
            ->where( 'context', $context )
            ->orderBy( 'sequence', 'asc' );

        return $menus->get();

    }

    public function getContexts() {

        return $this->model->select( 'context' )
            ->groupBy( 'context' )
            ->orderBy( 'context', 'asc' );

    }

}

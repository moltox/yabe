<?php


namespace moltox\yabe\Repositories;


use moltox\yabe\Menu;

class MenusRepository extends AbstractRepository {

    public function __construct( Menu $menu ) {

        parent::__construct( $menu );

    }

    public function forNavbarView( $context = 'yabe' ) {

        $menus = $this->model->select( '*' )
            ->where( 'active', true )
            ->where( 'context', $context )
            ->orderBy( 'sequence', 'asc' );

        return $menus->get();

    }

}

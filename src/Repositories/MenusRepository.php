<?php


namespace moltox\yabe\Repositories;


use moltox\yabe\Menu;
use Illuminate\Support\Facades\Log;


class MenusRepository extends AbstractRepository {

    public function __construct( Menu $menu ) {

        parent::__construct( $menu );

    }

    public function all( $context = '', $showRoot = false ) {

        $query = $this->model->select( '*' );

        if ( $context != '' ) $query = $query->where( 'context', $context );

        if ( !$showRoot ) $query = $query->where( 'name', '!=', 'root' );

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

    public function getAllParents() {

        $query = $this->model->select( '*' )
            ->where( 'active', true )
            ->where( 'parent', true );

        return $query->get();
    }

    public function moveUp( Menu $menu ) {

        $nextMenu = $this->getNextPossibleMenu( $menu, true );

        if ($nextMenu == null) return null;

        $this->moveMenuDown( $nextMenu, $menu );

        $this->refreshOrder( $menu->context );

    }

    public function moveDown( Menu $menu ) {


        $nextMenu = $this->getNextPossibleMenu( $menu, false );

        if ($nextMenu == null) return null;

        $this->moveMenuDown( $menu, $nextMenu );

        $this->refreshOrder( $menu->context );

    }

    private function moveMenuDown( Menu $srcMenu, Menu $targetMenu ) {

        $oldSequences['src'] = $srcMenu->sequence;
        $oldSequences['target'] = $targetMenu;

        // move belonging
        $this->moveMenusToNewSlot( $targetMenu, $oldSequences['src'] );

        // move notbelonging
        $this->moveMenusToNewSlot( $srcMenu, $oldSequences['src'] + $targetMenu->childs->count() + 1 );

        return;

    }


    private function moveMenusToNewSlot( Menu $menu, $newSequence ) {

        $tempSequence = $newSequence;

        $menu->sequence = $newSequence;

        $menu->save();

        foreach ( $menu->childs as $child ) {

            $tempSequence++;

            Log::info( 'Moving child ' . $child->name . ' from sequence ' . $child->sequence . ' to ' . $tempSequence );

            $child->sequence = $tempSequence;

            $child->save();

        }

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

        if ($moveUp)  {

            $nextSequence = $menu->sequence - 1;

            if ($nextSequence < 1) return null;

        }  else  {  // moving down

            if ($menu->childs->count() > 0) {

                $nextSequence = $menu->childs->last()->sequence + 1;

            } elseif( $menu->sequence >= $menu->parentMenu->childs->last()->sequence )  {  // check if already last in menu

                return null;

            } else  {

                $nextSequence = $menu->sequence + 1;

            }

            if ($nextSequence > $this->all( $menu->context, 'false')->count() ) return null;

        }

        $nextPossibleMenu = $this->getMenuBySequence( $nextSequence, $menu->context );

        return $nextPossibleMenu;

    }


    /**
     * @param $sequence
     * @param $context
     *
     * @return Menu $menu
     *
     * Finds and returns a whole menu by sequence number
     *
     * if the sequence number points to a parent, this will be returned
     * if the sequence number points to a child, the parent will be returned
     * if the sequence number points to a menu which is no parent, but on
     *    root level ( parent_id = 1 ), this menu will be returned
     *
     */
    private function getMenuBySequence( $sequence, $context ) {

        $menu = $this->model->where('sequence', $sequence)
            ->where('context', $context)
            ->first();

        if ( $menu->parent || $menu->parent_id == 1 )  {

            return $menu;

        }

        return $menu->parentMenu;

    }



    private function refreshOrder( $context )  {

        $menus = $this->all( $context )
                ->orderBy('sequence', 'asc')
                ->orderBy('parent', 'desc')
                ->get();

        $seq = 1;

        foreach ($menus as $menu)  {

            $menu->sequence = $seq;

            $menu->save();

            $seq++;

        }

    }



}

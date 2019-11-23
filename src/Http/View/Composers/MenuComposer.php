<?php


namespace moltox\yabe\Http\View\Composers;

use Illuminate\View\View;
use moltox\yabe\Repositories\MenusRepository;

class MenuComposer {

    /**
     * @var MenusRepository $menus ;
     */
    protected $menus;

    public function __construct( MenusRepository $menusRepository ) {

        $this->menus = $menusRepository;

    }

    public function compose( View $view ) {

        $view->with('menus', $this->menus->forNavBarView());

    }


}

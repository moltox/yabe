<?php


namespace moltox\yabe\Controllers;

use App\Http\Controllers\Controller;
use moltox\yabe\Helper\CustomFieldHelper;

abstract class AbstractController extends Controller  {

    /**
     * @var CustomFieldHelper $customFieldHelper
     */
    protected $customFieldHelper;

    public function __construct( CustomFieldHelper $customFieldHelper ) {

        $this->customFieldHelper = $customFieldHelper;

    }

}

<?php


namespace moltox\yabe\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use moltox\yabe\Helper\CustomFieldHelper;

abstract class AbstractController extends Controller {

    /**
     * @var CustomFieldHelper $customFieldHelper
     */
    protected $customFieldHelper;

    public function __construct( CustomFieldHelper $customFieldHelper ) {

        $this->customFieldHelper = $customFieldHelper;

    }

    protected function checkBoxMerge( Request $request, $name = '', $names = [] ) {

        if ($names == [])  {

            $names[] = $name;

        }

        foreach ($names as $name)  {

            if ($request->has($name) )  {

                $request[$name] = 1;

            } else {

                $request->merge([$name => 0]);

            }

        }

        return $request;

    }

}

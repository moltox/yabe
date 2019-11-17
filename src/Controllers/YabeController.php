<?php

namespace moltox\yabe\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YabeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('yabe::yabe.index');

    }


}

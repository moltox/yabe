<?php

namespace moltox\yabe\Http\Controllers;

class YabeController extends AbstractController
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

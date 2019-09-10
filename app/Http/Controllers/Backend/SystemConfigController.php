<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class SystemConfigController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }


    public function viewIndex()
    {

        return view('system-config/view_index');
    }
}

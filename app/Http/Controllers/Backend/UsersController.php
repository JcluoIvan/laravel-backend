<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class UsersController extends Controller
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
        return view('users/view_index');
    }
}

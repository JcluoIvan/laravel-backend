<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{

    /**
     * Undocumented variable
     *
     * @var View
     */
    public $view;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


        // $this->middleware('guest')->except('logout');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Gate $gate)
    {
        $gate->define('see-dashboard', function($user){
            return $user->roleAdmin() || $user->roleEditor();
        } );

        $this->middleware(['auth', 'can:see-dashboard']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}

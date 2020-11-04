<?php

namespace App\Http\Controllers;

use App\Ville;
use App\Secteur;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::User();
        $villes =Ville::All();
        $secteurs =Secteur::All();
        return view('home')->with(compact('user','villes','secteurs'));
    }
}

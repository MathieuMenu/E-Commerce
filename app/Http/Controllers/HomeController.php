<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = DB::table('commandes')
            ->select('*')
            ->where('livrer',0)
            ->paginate(4);

        return view('home')->With('commandes',$commandes);
    }
}

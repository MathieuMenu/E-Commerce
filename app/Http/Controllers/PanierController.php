<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Http\Controllers\Controller;
use DB;
use Session;

class PanierController extends Controller
{
    public function panier(){

        $panier = Session::get('panier');

        return view('panier')->WIth('panier',$panier);
    }
}

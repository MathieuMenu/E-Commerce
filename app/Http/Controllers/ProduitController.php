<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Http\Controllers\Controller;
use DB;
use Session;

class ProduitController extends Controller
{
    public function index(){

        $produits = DB::table('produits')
            ->select('*')
            ->where('affichage',1)
            ->paginate(6);

        return view('produit')->With('produits',$produits);
    }
}

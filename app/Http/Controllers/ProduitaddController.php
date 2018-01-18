<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Http\Controllers\Controller;
use DB;
use Session;

class ProduitaddController extends Controller
{
    public function index(){
        return view('produitAdd');
    }
    public function post(Request $request){

        $designation = $request->input('designation');
        $description = $request->input('description');
        $prix = $request->input('prix');
        $quantite = $request->input('quantite');

        DB::table('produits')->insert(
            ['designation' => $designation , 'description' => $description, 'prix' => $prix , 'nb_disponible' => $quantite ,'affichage'=> 1]
        );

        return Redirect("produit");
    }
}

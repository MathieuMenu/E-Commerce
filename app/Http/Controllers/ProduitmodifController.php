<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Http\Controllers\Controller;
use DB;
use Session;

class ProduitmodifController extends Controller
{
    public function index(){
        return view('produitModif');
    }

    public function index2(Request $request){

        $id = $request->input('id');

        $produits = DB::table('produits')
            ->select('*')
            ->where('affichage',1)
            ->where('id',$id)
            ->get();

        return view('produitModif')->With('produits',$produits);
    }

    public function index3(Request $request){

        $designation = $request->input('designation');
        $description = $request->input('description');
        $prix = $request->input('prix');
        $quantite = $request->input('quantite');
        $id = $request->input('id');

        DB::table('produits')->where('id',$id)->update(['designation' => $designation,'description' => $description,'prix' => $prix,'nb_disponible' => $quantite]);

        return Redirect("produit");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Http\Controllers\Controller;
use DB;
use Session;

class ProduitsuppController extends Controller
{
    public function index(Request $request){

        $id = $request->input('id');

        DB::table('produits')->where('id',$id)->update(['affichage' => 0]);

        return Redirect("produit");
    }
}

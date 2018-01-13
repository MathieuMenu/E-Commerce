<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Http\Controllers\Controller;
use DB;
use Session;

class IndexController extends Controller
{
    public function index(){
        if(Session::get('champ') != null){
            $champ=Session::get('champ');
            $tri=Session::get('tri');
        }
        else{
            Session::put('champ',"id");
            Session::put('tri',"");
            $champ=Session::get('champ');
            $tri=Session::get('tri');
        }

        $produits = DB::table('produits')
            ->select('*')
            ->orderBy($champ,$tri)
            ->paginate(6);

        return view('index')->With("produits",$produits);

    }
    public function Index2(Request $request){
        $champ = $request->input('action');
        Session::put('champ',$champ);
        $tri = $request->input('tri');
        Session::put('tri',$tri);

        $id = $request->input('id');
        $panier = DB::table('produits')
            ->where('id',$id)
            ->get();

        Session::push('panier',$panier);

        $produits = DB::table('produits')
            ->select('*')
            ->orderBy($champ,$tri)
            ->paginate(6);
        return view('index')->With("produits",$produits);

    }
}

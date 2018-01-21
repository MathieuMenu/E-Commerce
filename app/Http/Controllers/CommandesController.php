<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Http\Controllers\Controller;
use DB;
use Session;

class CommandesController extends Controller
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

        $commandes = DB::table('commandes')
            ->select('*')
            ->orderBy($champ,$tri)
            ->paginate(4);

        return view('commandes')->With("commandes",$commandes);

    }
    public function Index2(Request $request){
        $champ = $request->input('action');
        Session::put('champ',$champ);
        $tri = $request->input('tri');
        Session::put('tri',$tri);

        if($champ == "livrer"){
            if($tri=Session::get('tri') == "DESC"){
                $commandes = DB::table('commandes')
                    ->select('*')
                    ->where('livrer',0)
                    ->paginate(4);
                return view('commandes')->With("commandes", $commandes);
            }else{
                $commandes = DB::table('commandes')
                    ->select('*')
                    ->where('livrer',1)
                    ->paginate(4);
                return view('commandes')->With("commandes", $commandes);
            }

        }

        if($champ != "livrer"){

        $commandes = DB::table('commandes')
            ->select('*')
            ->orderBy($champ, $tri)
            ->paginate(4);
        return view('commandes')->With("commandes", $commandes);

        }
    }
}

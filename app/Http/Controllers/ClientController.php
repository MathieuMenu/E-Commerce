<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Http\Controllers\Controller;
use DB;
use Session;

class ClientController extends Controller
{
    public function index(){

        $clients = DB::table('commandes')
            ->select(DB::raw('sum(montant) as montant,max(datecommande) as datecommande, nom, email'))
            ->groupBy('nom','email')
            ->paginate(4);

        return view('client')->With('clients',$clients);
    }
}

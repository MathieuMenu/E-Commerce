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
        return view('produit');
    }
}

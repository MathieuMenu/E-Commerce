<?php

namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Produit;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Mail;

class PanierController extends Controller
{
    public function panier(){

        $panier = Session::get('panier');

        return view('panier')->With(['panier'=>$panier , 'message' => null]);
    }

    public function valider(Request $request){

        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $email = $request->input('email');
        $montant = $request->input('total');

        DB::table('commandes')->insert(
            ['nom' => $nom , 'prenom' => $prenom, 'email' => $email , 'montant' => $montant ,'datecommande' => NOW()]
        );

        $panier = Session::get('panier');

        //$content = "Bonjour".$nom." ".$prenom."/r /n"."Votre commande chez nous ayant le montant : ".$montant." à bien été prise en compte";
        $content="Mon message !";
        $title="Votre commande chez E-commerce";
        $user_mail=$email;
        $user_name="Mathieu";

        try{
            $emails = [$user_mail,'mathieu.menu02@gmail.com'];
            $data = ['email' => $user_mail, 'name' => $user_name, 'subject'=>$title,'content'=>$content];
                Mail::send('mail',$data, function($message) use ($emails,$data){
                    $subject=$data['subject'];
                    $message->from('mathieu.menu02@gmail.com');
                    $message->to($emails);
                    $message->subject($subject);

                });
        }
        catch (\Exception $e){
            dd($e->getMessage());
        }

        return view('panier')->With(['panier' => $panier, 'message' => "La commande à bien été enregistrée !"]);
    }
}

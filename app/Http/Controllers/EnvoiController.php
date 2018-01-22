<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Mail;

class EnvoiController extends Controller
{
    public function index(Request $request){

        $id = $request->input('id');

        $email = $request->input('email');

        DB::table('commandes')->where('id',$id)->update(['livrer' => 1]);

        $content="Mon message !";
        $title="Votre commande chez E-commerce";
        $user_mail=$email;
        $user_name="";

        try{
            $emails = [$user_mail];
            $data = ['email' => $user_mail, 'name' => $user_name, 'subject'=>$title,'content'=>$content];
            Mail::send('mail2',$data, function($message) use ($emails,$data){
                $subject=$data['subject'];
                $message->from('mathieu.menu02@gmail.com');
                $message->to($emails);
                $message->subject($subject);

            });
        }
        catch (\Exception $e){
            dd($e->getMessage());
        }

        return Redirect("home");
    }
}

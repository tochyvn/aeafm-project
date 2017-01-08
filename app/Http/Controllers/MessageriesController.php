<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
//se Illuminate\Support\Facades\Input;
use App\TypeFormation;
use App\Formation;
use App\User;
use App\Inscription;
use App\Domaine;
use App\NiveauEtude;
use App\Aide;
use App\Pays;
use App\Statut;
use App\Amis;
use App\Messageries;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\DB;




class MessageriesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        $user = User::get();
        
        $pays = Pays::get();
        $aide = Aide::get();
         //trouver les domaines dans les quels j'ai proposé mon aide
             $domaine = DB::select('select * from aides ,users, domaines where  domaines.id=aides.domaine_id and aides.user_id=users.id and users.id = ?' , [$id]);
         
            $messagesRecive=    DB::table('users')
            ->whereExists(function ($query) use( $id)  {
            $query->select(DB::raw(1) )
                  ->from('messageries')
                  ->whereRaw('Messageries.sender_id=users.id and Messageries.lu=0 ')
                  ->where('Messageries.recipient_id',$id);
     
            })->get();
		   //dd($messagesRecive);	
		//liste de ceux à qui j'ai envoyé un message 
           $messagesSend=    DB::table('users')
            ->whereExists(function ($query) use( $id)  {
            $query->select(DB::raw(1) )
                  ->from('messageries')
                  ->whereRaw('Messageries.recipient_id=users.id ')
                  ->where('Messageries.sender_id',$id);
     
            })->get();
        //$user=User::where('email',$user)->first();
        //$user=$auth->user();
        if (Auth::check()) {

            $typeFormation = TypeFormation::get();
            $formation = Formation::get();
            $inscription = TypeFormation::get();
            if (Auth::user()->role == 5) {
                return view('admin/admin', compact('typeFormation', 'formation', 'inscription', 'domaine'));
            } else {

          //recupere les messages reçus et emis
             $allMessage=    DB::table('messageries')
            ->whereExists(function ($query) use( $id,$recipient_id)  {
            $query->select(DB::raw(1) )
                  ->from('users')
                  ->whereRaw('Messageries.recipient_id=users.id')
                  ->where([
                  	['Messageries.recipient_id', '=', $recipient_id],
                    ['Messageries.sender_id', '=', $id]])
                  ->orwhere([
                  	['Messageries.recipient_id', '=',$id ],
                    ['Messageries.sender_id', '=',$recipient_id ]])
                ;
     
            })->get();
        return response()->json($allMessage);


                return view('user.index', compact('typeFormation', 'formation', 'inscription', 'user', 'domaine', 'pays', 'aide','messagesSend', 'messagesRecive'));
                ;
            }
        }
        return view('errors.503');
    }

    public function logout() {
        Auth::logout();
    }

    public function edit($id) {   //si $id est un chiffre
        if (ctype_digit($id)) {
            $formation = Formation::get();
            $inscription = Inscription::get();
            $typeFormation = typeFormation::get();
            $user = User::findOrFail($id);
            return view('user.edit', compact('user', 'formation', 'inscription', 'typeFormation'));
        }
        return view('errors.503');
    }

    public function create(Request $request) {
         
        $formation = Formation::get();
        $inscription = Inscription::get();
        $typeFormation = typeFormation::get();
       
        
        $recipient_id=$request->recipient_id;
        $user = Auth::user();
        $aide = Aide::get();
        $id=$user->id;
      	$messageRecu = DB::select('select * from users, Messageries where  Messageries.sender_id=users.id and Messageries.recipient_id = ?' , [$id]);
    	   //dd($messageRecu);
		//liste de ceux dont j'ai reçu un message  et que je n'est pas lu
           $messagesRecive=    DB::table('users')
            ->whereExists(function ($query) use( $id)  {
            $query->select(DB::raw(1) )
                  ->from('messageries')
                  ->whereRaw('Messageries.sender_id=users.id and Messageries.lu=0 ')
                  ->where('Messageries.recipient_id',$id);
     
            })->get();
		   //dd($messagesRecive);	
		//liste de ceux à qui j'ai envoyé un message 
           $messagesSend=    DB::table('users')
            ->whereExists(function ($query) use( $id)  {
            $query->select(DB::raw(1) )
                  ->from('messageries')
                  ->whereRaw('Messageries.recipient_id=users.id ')
                  ->where('Messageries.sender_id',$id);
     
            })->get();
		  // dd($messagesSend);
        $allMessage=Messageries::where('recipient_id',$recipient_id)->get(); 
        $user_recipient=User::where('id',$recipient_id)->get();
         //trouver les domaines dans les quels j'ai proposé mon aide
             $domaine = DB::select('select * from aides ,users, domaines where  domaines.id=aides.domaine_id and aides.user_id=users.id and users.id = ?' , [$id]);
         
          //dd($allMessage);
        return view('messagerie.create', compact('user', 'formation', 'inscription', 'typeFormation',  'domaine', 'user_recipient', 'aide','allMessage','messagesSend','messagesRecive' ));
    }

    public function update($id, Request $request) {

        //si $id est un chiffre
        if (ctype_digit($id)) {
            $user = User::findOrFail($id);
            $user->update($request->all());
            Session::flash('success', 'update successful');
            return redirect(route('user.create', $id));
        }
        return view('errors.503');
    }

    //mie à user et aide ccolaire 
    public function recive_msg(Request $request,$id) {
  
    }

    
 public function store(Request $request) {
       $user = Auth::user();
        $aide = Aide::get();
        $id=$user->id;
        $recipient_id=$request->recipient_id;
 
     $user_recipient=User::where('id',$recipient_id)->get();
      $message=Messageries::create($request->all());
       $allMessage=    DB::table('messageries')
            ->whereExists(function ($query) use( $id,$recipient_id)  {
            $query->select(DB::raw(1) )
                  ->from('users')
                  ->whereRaw('Messageries.recipient_id=users.id')
                  ->where([
                  	['Messageries.recipient_id', '=', $recipient_id],
                    ['Messageries.sender_id', '=', $id]])
                  ->orwhere([
                  	['Messageries.recipient_id', '=',$id ],
                    ['Messageries.sender_id', '=',$recipient_id ]])
                ;
     
            })->get();
            $message_id=$message->id;
             $allMessage=Messageries::where('id',$message_id)->get();
             
     return response()->json($allMessage);
    
        
    }

   
    public function show($recipient_id){

         $formation = Formation::get();
        $inscription = Inscription::get();
        $typeFormation = typeFormation::get();
       
        
        
        $user = Auth::user();
        $aide = Aide::get();
        $id=$user->id;
      	$messageRecu = DB::select('select * from users, Messageries where  Messageries.sender_id=users.id and Messageries.recipient_id = ?' , [$id]);
    	   //dd($messageRecu);
		//liste de ceux dont j'ai reçu un message  et que je n'est pas lu
           $messagesRecive=    DB::table('users')
            ->whereExists(function ($query) use( $id)  {
            $query->select(DB::raw(1) )
                  ->from('messageries')
                  ->whereRaw('Messageries.sender_id=users.id and Messageries.lu=0 ')
                  ->where('Messageries.recipient_id',$id);
     
            })->get();
		   //dd($messagesRecive);	
		//liste de ceux à qui j'ai envoyé un message 
           $messagesSend=    DB::table('users')
            ->whereExists(function ($query) use( $id)  {
            $query->select(DB::raw(1) )
                  ->from('messageries')
                  ->whereRaw('Messageries.recipient_id=users.id ')
                  ->where('Messageries.sender_id',$id);
     
            })->get();

            //recupere les messages reçus et emis
             $allMessage=    DB::table('messageries')
            ->whereExists(function ($query) use( $id,$recipient_id)  {
            $query->select(DB::raw(1) )
                  ->from('users')
                  ->whereRaw('Messageries.recipient_id=users.id')
                  ->where([
                  	['Messageries.recipient_id', '=', $recipient_id],
                    ['Messageries.sender_id', '=', $id]])
                  ->orwhere([
                  	['Messageries.recipient_id', '=',$id ],
                    ['Messageries.sender_id', '=',$recipient_id ]])
                ;
     
            })->get();
		  
        //$allMessage=Messageries::where('recipient_id',$recipient_id)->get();
        $user_recipient=User::where('id',$recipient_id)->get();
         //trouver les domaines dans les quels j'ai proposé mon aide
            $aide=Aide::where('user_id',$id)->get();
            $domaine=Domaine::get();
            
        return view('messagerie.create', compact('user', 'formation', 'inscription', 'typeFormation',  'domaine', 'user_recipient', 'aide','allMessage','messagesSend','messagesRecive' ));
    }
    

}

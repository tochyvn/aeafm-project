<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormationRequest;
use App\TypeFormation;
use App\Formation;
use App\User;
use App\Inscription;
use App\Domaine;
use App\NiveauEtude;
use App\Aide;
use App\Pays;
use App\Statut;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\Validator;
use App\Commun;
use Illuminate\Support\Facades\DB;

 
class AideScolaireController extends Controller
{
    public function index()
    {
    	 $typeFormation=TypeFormation::get();
       $formation=Formation::get();
         $user_id=Auth::user()->id;
         //selectionner les domaines dans les quels je propose mon aide
         $aide=Aide::where('user_id',$user_id)->get();
        $messagesRecive= Commun::msgRecive($id);
        $messagesSend= Commun::msgSend($id);
    	return view('formation.index',compact('formation','messagesRecive','messagesSend','typeFormation','aide'));
    }

    public function edit($id ,Request $request)
    {
     
    if(ctype_digit($id)){ 
     if (Auth::check()){ 
     $user_id=Auth::user()->id;
     $user=User::get();
    
       $user_id=Auth::user()->id;
         $aide=Aide::where('user_id',$user_id)->get();
     $typeFormation=TypeFormation::get();
     $formation=Formation::get();
     $inscription=TypeFormation::get();
     $domaineShow=Domaine::findOrFail($id);
     $domaine=Domaine::get();
     $messagesRecive= Commun::msgRecive($id);
     $messagesSend= Commun::msgSend($id);

    	 return view('user.edit-aide',compact('typeFormation', 'formation','inscription','user','domaineShow','domaine','messagesRecive','messagesRecive','pays','aide'));      }
      }
      return view('errors.503');
    }

    public function create()
    {

       if (Auth::check() && Auth::user()->role == 5){
          $typeFormation = TypeFormation::pluck('name', 'id'); 
          $formation=formation::get();
          $messagesRecive= Commun::msgRecive($id);
          $messagesSend= Commun::msgSend($id);
        	return view('inscription.create',compact('typeFormation','messagesRecive','messagesRecive','formation'));
        }
          return view('errors.503');
    }

    

    public function store(Request $request)
     { 
    
          
        
        $id= $request->get('user_id');
       
     
        //aide domaines et utilisateur  
        $aideScolaire=$request->get('domaine');
        $user_id=Auth::user()->id;
        foreach ($aideScolaire as $value) {
           

          //si j'ai déjà proposé mon aide pour se domaine ne faire rien
         $aide=Aide::where('user_id',$user_id,'domaine_id',$request->domaine_id)->first();
          
          
         if(!isset($aide)){

        $aide=Aide::create($request->all());
        
        $aide->user_id=$id;
        $aide->domaine_id=$value;
        $description='description_'.$value;
        $aide->description=$request->get($description);;
        $aide->save();
        Session::flash('success','merci pour votre aide. Des étudiants vont déhormais entrer en conctact avec vous');
         }  
        }
        

         $aide=Aide::where('user_id',$user_id)->get();
         $typeFormation=TypeFormation::get();
         $formation=Formation::get();
         $inscription=TypeFormation::get();
          
            $domaine=Domaine::get();
          $messagesRecive= Commun::msgRecive($id);
        $messagesSend= Commun::msgSend($id);
      
      return view('user.create',compact('user','formation','typeFormation','domaines','domaine','user','aide','messagesSend','messagesRecive'));
     }

     public function show($id, Request $request)
     {
      
      //si $id est un chiffre
      if(ctype_digit($id))
       if (Auth::check()){
            $user_id=Auth::user()->id;
         
        
         $pays=Pays::get();
         $aide=Aide::where('user_id',$user_id)->get();
         $typeFormation=TypeFormation::get();
         $formation=Formation::get();
         $inscription=TypeFormation::get();
         $domaineShow=Domaine::findOrFail($id);
         $domaine=Domaine::get();
         $messagesRecive= Commun::msgRecive($id);
          $messagesSend= Commun::msgSend($id);
       
           return view('user.show-aide',compact('typeFormation', 'formation','inscription','user','domaineShow','domaine','pays','aide','messagesSend','messagesRecive'));
      
    }
    return view('errors.503');
 }
    
    public function update($id,Request $request)
    {  
           
      if (Auth::check()){
        $aide=Aide::findOrFail($id);
        $domaine_id=$aide->domaine_id;
        $aide->update($request->all());
         Session::flash('success','update successful');
          
         
            $user_id=Auth::user()->id;
         $aide=Aide::where('user_id',$user_id)->get();
           $typeFormation=TypeFormation::get();
           $formation=Formation::get();
           $inscription=TypeFormation::get();
           $domaineShow=Domaine::findOrFail($domaine_id);
           $domaine=Domaine::get();
           $messagesRecive= Commun::msgRecive($id);
          $messagesSend= Commun::msgSend($id);

  
       return view('user.show-aide',compact('typeFormation', 'formation','inscription','domaineShow','domaine','pays','aide','messagesRecive','messagesSend'));
  
      
       }
      return view('errors.503');
    }
    
    public function destroy($id)
    {      
       if (Auth::check()){
          
         $domaine_id="1";
      
             Aide::findOrFail($id)->delete();;
            
            
             Session::flash('success','Successful supression');
          
           $user_id=Auth::user()->id;
         $aide=Aide::where('user_id',$user_id)->get();
         
           $user_id=Auth::user()->id;
        
         

          $typeFormation = TypeFormation::get();
          $formation = Formation::get();
          $inscription = TypeFormation::get();
          $domaineShow = Domaine::get();
          $domaine = Domaine::get();
          $domaineShow=Domaine::findOrFail($domaine_id);
          $messagesRecive= Commun::msgRecive($user_id);
          $messagesSend= Commun::msgSend($user_id);
          return view('user.show-aide',compact('typeFormation', 'formation','inscription','domaineShow','domaine','pays','aide','messagesSend','messagesRecive'));
  
        }
          return view('errors.503');
    }
   
}

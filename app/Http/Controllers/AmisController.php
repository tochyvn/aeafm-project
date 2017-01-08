<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
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
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\Validator;
     
class AmisController extends Controller
{    
   public function index()
    {  
       
     $user=User::get();
      $domaine=Domaine::get();
      $pays=Pays::get();
      $aide=Aide::get();
     //$user=User::where('email',$user)->first();
     //$user=$auth->user();
  if (Auth::check()){

     $typeFormation=TypeFormation::get();
     $formation=Formation::get();
     $inscription=TypeFormation::get();
     if(Auth::user()->role==5) {
     return view('admin/admin',compact('typeFormation', 'formation','inscription','domaine'));
     }
      else{
       return view('user.index',compact('typeFormation', 'formation','inscription','user','domaine','pays','aide'));;
    }
  }
    return view('errors.503');
    
}

      

 public function logout()
    {
      Auth::logout();    
    }


   public function edit($id)
    {   //si $id est un chiffre
      if(ctype_digit($id)){
     $formation=Formation::get();
         $inscription=Inscription::get(); 
         $typeFormation=typeFormation::get();
        $user=User::findOrFail($id);
        return view('user.edit',compact('user','formation','inscription','typeFormation'));
    }
    return view('errors.503');
    }

    public function create()
    {
         $formation=Formation::get();
         $inscription=Inscription::get(); 
         $typeFormation=typeFormation::get();
         $domaines=Domaine::pluck('name', 'id'); 
         $domaine=Domaine::get();
         $user=User::get();
         $aide=Aide::get();
         $niveauEtude=NiveauEtude::pluck('name', 'id'); 
        return view('user.create',compact('user','formation','inscription','typeFormation', 'domaines','niveauEtude','domaine','user','aide'));
    }
   
     public function update($id,Request $request)
    {  
         
      //si $id est un chiffre
      if(ctype_digit($id)){
        $user=User::findOrFail($id);
        $user->update($request->all());
         Session::flash('success','update successful');
       return redirect(route('user.create',$id));
       
      }
      return view('errors.503');
    }
     //demande d'amitié 
    public function store(Request $request)
     { 
     
       
      if (Auth::check()){
        $user_id=Input::get('user_id');
        $freind_id=Input::get('freind_id');
       
        
        $amis=Amis::create($request->all());
        Session::flash('success','demande envoyée');
        return redirect(route('user.index'));  
      }
        
         

     }


            
     public function show($id){
         //si $id est un chiffre
      if(ctype_digit($id))
         $typeFormation=TypeFormation::get();
         $formation=Formation::get();
         $inscription=TypeFormation::get();       
        return view('user.show',compact('typeFormation', 'formation','inscription'));

     }
   public function profil(){
  
     
    if (Auth::check()) {
         $typeFormation=TypeFormation::get();
         $formation=Formation::get();
         $inscription=TypeFormation::get(); 
         $domaine_id=Auth::user()->domaine_id;
         $level_id=Auth::user()->level_id;
         $pays_origin=Auth::user()->country_origin_id;
         $pays_residence=Auth::user()->country_residence_id;
         $role=Auth::user()->role;
         $domaines=Domaine::findOrFail($domaine_id)->name;
         $level=NiveauEtude::findOrFail($level_id)->name;
         $paysOrigin=Pays::findOrFail($pays_origin)->nom_fr_fr;
         $paysResidence=Pays::findOrFail($pays_residence)->nom_fr_fr;
         $statut=Statut::findOrFail($role)->name;
         $user=User::get();
         $domaine=Domaine::get();
         $aide=Aide::get();

        return view('user.profil',compact('typeFormation', 'formation','inscription','domaines','level','paysOrigin','paysResidence','statut','domaine','use','aide'));    
    }
     return view('errors.503');
        
   }

   public function recherche(Request $request){

   
     //$user=User::where('email',$user)->first();
     //$user=$auth->user();
  if (Auth::check()){
     $user=User::get();
      $domaine=Domaine::get();
      $pays=Pays::get();
      $search=$request->get('search');
      $aide=Aide::get();
     $typeFormation=TypeFormation::get();
     $formation=Formation::get();
     $inscription=TypeFormation::get();
     $domaines=Domaine::where('name', 'like', '%' . $search.'%' )->get();
    
     
       return view('user.recherche',compact('typeFormation', 'formation','inscription','user','domaine','domaines','pays','aide'));
  }
    return view('errors.503');
    
}
 
 public function showAide($id){
     //si $id est un chiffre
    if(ctype_digit($id))
    if (Auth::check()){
        $user_id=Auth::user()->id;
     $user=User::get();
    
     $pays=Pays::get();
     $aide=Aide::get();
     $typeFormation=TypeFormation::get();
     $formation=Formation::get();
     $inscription=TypeFormation::get();
     $domaineShow=Domaine::findOrFail($id);
     $domaine=Domaine::get();
     
  
       return view('user.show-aide',compact('typeFormation', 'formation','inscription','user','domaineShow','domaine','pays','aide'));
  }
    return view('errors.503');
    

 }
}

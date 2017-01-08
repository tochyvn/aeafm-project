<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationRequest;
use Illuminate\Http\Request;
use App\TypeFormation;
use App\Formation;
use App\User;
use App\Inscription;
use App\Aide;
use App\Domaine;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\Validator;

class FormationController extends Controller
{
    


    public function index()
    {
    	 $typeFormation=TypeFormation::get();
       $formation=Formation::get();
       $user=User::get();
       $inscription=Inscription::get();
      
    	return view('formation.index',compact('formation','typeFormation','inscription'));
    }

    public function edit($id)
    {
      //si $id est un entier
      if(ctype_digit($id))
      if (Auth::check() && Auth::user()->role == 5){
      $formation=Formation::findOrFail($id);
       $typeFormation = TypeFormation::pluck('name', 'id'); 
    	 
    	 return view('formation.edit',compact('formation','typeFormation' ));
      }
      return view('errors.503');
    }

    public function create()
    {

       if (Auth::check() && Auth::user()->role == 5){
          $typeFormation = TypeFormation::pluck('name', 'id'); 
          $formation=formation::get();
        	return view('formation.create',compact('typeFormation','formation'));
        }
          return view('errors.503');
    }

    public function destroy($id)
    {
        //si $id est un entier
      if(ctype_digit($id))
       if (Auth::check() && Auth::user()->role == 5){
          TypeFormation::findOrFail($id)->delete();
          Session::flash('success','Successful supression');
         return redirect(route('type-formation.index'));
        }
          return view('errors.503');
    }

    public function store(FormationRequest $request)
     { 
     // dd($request);
        if (Auth::check() && Auth::user()->role == 5){
        $name=Input::get('name');
        $formation=Formation::where('name',$name)->first();
        if(!$formation){
         $formation=Formation::create($request->all());
        Session::flash('success','Successful addition');
         return redirect(route('formation.create',$formation));
        }
        
      }
      return view('errors.503');
     }

     public function show($id)
     {
         //si $id est un entier
      if(ctype_digit($id)){
       
         $formation=Formation::get()->where('type_id',$id);
         $inscription=Inscription::get(); 
         $typeFormation=typeFormation::get(); 
         $domaine=Domaine::get(); 
         $aide=Aide::get(); 
   
        return view('user.show',compact('formation','inscription','typeFormation','aide','domaine'));
       }
         return view('errors.503');
     }
    
    public function update($id,Request $request)
    {  
          //si $id est un entier
      if(ctype_digit($id))
    	if (Auth::check() && Auth::user()->role == 5){
        $formation=Formation::findOrFail($id);

        $formation->update($request->all());
         Session::flash('success','update successful');
       return redirect(route('formation.edit',$id));
       }

      return view('errors.503');
    }


}

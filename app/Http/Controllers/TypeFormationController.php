<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeFormation;
use App\Formation;
use App\Inscription;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use App\User;
use App\Domaine;
use App\Aide;
use App\Http\Requests\TypeFormationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\Validator;

class TypeFormationController extends Controller
{
    public function index()
    {
    	 $formation=Formation::get();
       $inscription=Inscription::get(); 
       $typeFormation=typeFormation::get(); 
      
    return view('user.show',compact('formation','inscription','typeFormation'));
    }

    public function edit($id)
    {
        //si $id est un entier
      if(ctype_digit($id))
      if (Auth::check() && Auth::user()->role == 5){
       $typeFormation=TypeFormation::get();
    	 $typeFormationEdit=TypeFormation::findOrFail($id);
    	 return view('type-Formation.edit',compact('typeFormationEdit','typeFormation' ));
      }
      return view('errors.503');
    }

    public function create()
    {


       if (Auth::check() && Auth::user()->role == 5){
          $typeFormation=TypeFormation::get();
        	return view('type-Formation.create',compact('typeFormation'));
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

    public function store(TypeFormationRequest  $request)
     { 
        if (Auth::check() && Auth::user()->role == 5){
        $name=Input::get('name');
        $typeFormation=TypeFormation::where('name',$name)->first();
        if(!$typeFormation){
         $typeFormation=TypeFormation::create($request->all());
        Session::flash('success','Successful addition');
         return redirect(route('type-formation.create',$typeFormation));
        }
        
      }
      return view('errors.503');
     }

      public function show($id){
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
        $typeFormation=TypeFormation::findOrFail($id);

        $typeFormation->update($request->all());
         Session::flash('success','update successful');
       return redirect(route('type-formation.edit',$id));
       }

      return view('errors.503');
    }




}

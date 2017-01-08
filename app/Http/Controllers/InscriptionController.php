<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormationRequest;
use App\TypeFormation;
use App\Formation;
use App\User;
use App\Inscription;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\Validator;

class InscriptionController extends Controller
{
    


    public function index()
    {
    	 $typeFormation=TypeFormation::get();
       $formation=Formation::get();
       $user=User::get();

    	return view('formation.index',compact('formation','typeFormation'));
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
        	return view('inscription.create',compact('typeFormation','formation'));
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

    public function store(Request $request)
     { 
    
        if (Auth::check()){    
         Inscription::create($request->all());
         $id=$request->get('type_id');
         Session::flash('success','inscription réusie');
         return redirect(route('formation.show',$id)); 
      }
         return redirect(route('login'));

     }

     public function show()
     {
       /*$formation=Formation::get()->where('type_id',$id);
       //dd($formation);
        return view('formation.show',compact('formation'));*/
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

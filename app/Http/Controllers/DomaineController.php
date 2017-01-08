<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Domaine;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DomaineRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\Validator;

class DomaineController extends Controller
{
    public function index()
    {
    	$domaine=Domaine::get();
      
      return view('domaine.index',compact('domaine'));
    }

    public function edit($id)
    { 
      //si $id est un entier
      if(ctype_digit($id))
      if (Auth::check() && Auth::user()->role == 5){
      
    	 $domaine=Domaine::findOrFail($id);
    	 return view('domaine.edit',compact('domaine'));
      }
      return view('errors.503');
    }

    public function create()
    {


       if (Auth::check() && Auth::user()->role == 5){
       	
          $domaine=Domaine::get();
        	return view('domaine.create',compact('domaine'));
        }
          return view('errors.503');
    }

    public function destroy($id)
    {
        //si $id est un entier
      if(ctype_digit($id))
       if (Auth::check() && Auth::user()->role == 5){
          Domaine::findOrFail($id)->delete();
          Session::flash('success','Successful supression');
         return redirect(route('domaine.index'));
        }
          return view('errors.503');
    }

    public function store(DomaineRequest  $request)
     { 
        if (Auth::check() && Auth::user()->role == 5){
        $name=Input::get('name');
        $domaine=Domaine::where('name',$name)->first();
        if(!$domaine){
         $domaine=Domaine::create($request->all());
        Session::flash('success','Successful addition');
         return redirect(route('domaine.create',$domaine));
        }
        
      }
      return view('errors.503');
     }

      public function show(){
         
         return view('errors.503');
    }
    
    public function update($id,Request $request)
    {  
      //si $id est un entier
      if(ctype_digit($id))
          
    	if (Auth::check() && Auth::user()->role == 5){
        $domaine=Domaine::findOrFail($id);
        $domaine->update($request->all());
         Session::flash('success','update successful');
       return redirect(route('domaine.edit',$id));
       }

      return view('errors.503');
    }




}

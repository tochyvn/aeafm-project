<?php

namespace App\Http\Controllers;
use App\User;
use App\Statut;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StatutRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\Validator;

class StatutController extends Controller
{

    public function index()
    {
    	$statut=Statut::get();
      
      return view('statut.index',compact('statut'));
    }

    public function edit($id)
    {
        //si $id est un entier
      if(ctype_digit($id))
      if (Auth::check() && Auth::user()->role == 5){
      
    	 $statut=Statut::findOrFail($id);
    	 return view('statut.edit',compact('statut'));
      }
      return view('errors.503');
    }

    public function create()
    {


       if (Auth::check() && Auth::user()->role == 5){
       	
          $statut=Statut::get();
        	return view('statut.create',compact('statut'));
        }
          return view('errors.503');
    }

    public function destroy($id)
    {
        //si $id est un entier
      if(ctype_digit($id))

       if (Auth::check() && Auth::user()->role == 5){
          Statut::findOrFail($id)->delete();
          Session::flash('success','Successful supression');
         return redirect(route('statut.index'));
        }
          return view('errors.503');
    }

    public function store(StatutRequest  $request)
     { 
        if (Auth::check() && Auth::user()->role == 5){
        $name=Input::get('name');
        $statut=statut::where('name',$name)->first();
        if(!$statut){
         $statut=Statut::create($request->all());
        Session::flash('success','Successful addition');
         return redirect(route('statut.create',$statut));
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
        $statut=Statut::findOrFail($id);
        $statut->update($request->all());
         Session::flash('success','update successful');
       return redirect(route('statut.edit',$id));
       }

      return view('errors.503');
    }




}

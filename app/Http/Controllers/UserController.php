<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Redirect;
use Illuminate\Support\Facades\Input;
class UserController extends Controller
{
     public function index()
    {
    	 $user=User::get();
       dd($user);
    //	return view('user.index',compact('user'));
    }

    public function edit($id)
    {

    	$user=User::findOrFail($id);
    	add($user);
    	return view('user.edit',compact('user'));
    }
    public function create()
    {
    	return view('user.create');
    }
    
    public function update($id,Request $request)
    {  // dd($request->all());
        $user=User::findOrFail($id);
        $user->update($request->all());
         
       return redirect(route('news.edit',$id));
    
    }

   public function store(Request $request)
     {
      $user=User::create($request->all());
      return redirect(route('news.edit',$user));
     }


}

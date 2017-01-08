<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use Illuminate\Html\FormFacade;
class ContactController extends Controller
{
    public function create()
    {
    	return view('contact.create');
    
    }

    
  public function store(ContactFormRequest $request)
       {

   //dd($request);
    \Mail::send('emails.contact',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function($message)
    {
        $message->from('president.aeafm@gmail.com');
        $message->to('fokouemartial10@gmail.com', 'Admin')->subject('TODOParrot Feedback');
    });

  return \Redirect::route('send')->with('message', 'Thanks for contacting us!');

    }
}

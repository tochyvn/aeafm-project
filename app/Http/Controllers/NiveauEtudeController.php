<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\NiveauEtude;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DomaineRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\Validator;

class NiveauEtudeController extends Controller {

    public function index() {
        $niveauEtude = NiveauEtude::get();

        return view('niveau-etude.index', compact('niveauEtude'));
    }

    public function edit($id) {
        //si $id est un entier
        if (ctype_digit($id))
            if (Auth::check() && Auth::user()->role == 5) {

                $niveauEtude = NiveauEtude::findOrFail($id);
                return view('niveau-etude.edit', compact('niveauEtude'));
            }
        return view('errors.503');
    }

    public function create() {


        if (Auth::check() && Auth::user()->role == 5) {

            $niveauEtude = NiveauEtude::get();
            return view('niveau-etude.create', compact('niveauEtude'));
        }
        return view('errors.503');
    }

    public function destroy($id) {
        //si $id est un entier
        if (ctype_digit($id))
            if (Auth::check() && Auth::user()->role == 5) {
                NiveauEtude::findOrFail($id)->delete();
                Session::flash('success', 'Successful supression');
                return redirect(route('niveau-etude.index'));
            }
        return view('errors.503');
    }

    public function store(DomaineRequest $request) {
        if (Auth::check() && Auth::user()->role == 5) {
            $name = Input::get('name');
            $niveauEtude = NiveauEtude::where('name', $name)->first();
            if (!$niveauEtude) {
                $niveauEtude = NiveauEtude::create($request->all());
                Session::flash('success', 'Successful addition');
                return redirect(route('niveau-etude.create', $niveauEtude));
            }
        }
        return view('errors.503');
    }

    public function show() {

        return view('errors.503');
    }

    public function update($id, Request $request) {
        //si $id est un entier
        if (ctype_digit($id))
            if (Auth::check() && Auth::user()->role == 5) {
                $niveauEtude = NiveauEtude::findOrFail($id);
                $niveauEtude->update($request->all());
                Session::flash('success', 'update successful');
                return redirect(route('niveau-etude.edit', $id));
            }

        return view('errors.503');
    }

}

?>
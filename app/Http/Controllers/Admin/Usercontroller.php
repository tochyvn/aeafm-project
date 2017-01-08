<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//se Illuminate\Support\Facades\Input;
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
use Illuminate\Support\Facades\DB;
//fichiervariable commune
use App\Commun;
class Usercontroller extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Guard $auth) {

        $user = User::get();
        
        $pays = Pays::get();
        $aide = Aide::get();
         //trouver les domaines dans les quels j'ai proposé mon aide

         
        //$user=User::where('email',$user)->first();
       
        if (Auth::check()) {
        $user=$auth->user();
        $id=$user->id;
        $messagesRecive= Commun::msgRecive($id);
        $messagesSend= Commun::msgSend($id);
        $domaine=Domaine::get();

        //les domaines dans lequel j'aide
        $domaines= Commun::domainesAide($id);
         
         $aide=Aide::where('user_id',$id)->get();
            $typeFormation = TypeFormation::get();
            $formation = Formation::get();
            $inscription = TypeFormation::get();
            if (Auth::user()->role == 5) {
                return view('admin/admin', compact('typeFormation', 'formation', 'inscription', 'domaine','domaines','messagesRecive','messagesSend'));
            } else {
                return view('user.index', compact('typeFormation', 'formation', 'inscription', 'user', 'domaine', 'pays', 'aide','messagesRecive','messagesSend','domaines'));
                ;
            }
        }
        return view('errors.503');
    }

    public function logout() {
        Auth::logout();
    }

    public function edit($id) {   //si $id est un chiffre
        if (ctype_digit($id)) {
            $formation = Formation::get();
            $inscription = Inscription::get();
            $typeFormation = typeFormation::get();
            $user = User::findOrFail($id);
            return view('user.edit', compact('user', 'formation', 'inscription', 'typeFormation'));
        }
        return view('errors.503');
    }

    public function create(Request $request) {
          
        $formation = Formation::get();
        $inscription = Inscription::get();
        $typeFormation = typeFormation::get();
        $domaines = Domaine::get();
       $id = $request->session()->get('user_id');
        $user = User::get();
        $aide = Aide::where('user_id',$id)->get();
        
         
        $messagesRecive= Commun::msgRecive($id);
        $messagesSend= Commun::msgSend($id);

        $niveauEtude = NiveauEtude::pluck('name', 'id');
         //trouver les domaines dans les quels j'ai proposé mon aide
             $domainesInscrire = DB::select('select * from  aides  where aides.user_id = ?' , [ $id]);
            
           //trouver les domaines dans les quels j'ai proposé mon aide
             $domaine =Domaine::get();
           
      
        return view('user.create', compact('user', 'formation', 'inscription', 'typeFormation', 'domainesInscrire', 'niveauEtude', 'domaine', 'user', 'aide', 'messagesRecive','messagesSend'));
    }

    public function update($id, Request $request) {

        //si $id est un chiffre
        if (ctype_digit($id)) {
            $user = User::findOrFail($id);
            $user->update($request->all());
            Session::flash('success', 'update successful');
            return redirect(route('user.create', $id));
        }
        return view('errors.503');
    }

    //mie à user et aide ccolaire 
    public function store(Request $request) {
        
    }

    public function show($id) {
        //si $id est un chiffre
        if (ctype_digit($id))
            $typeFormation = TypeFormation::get();
        $formation = Formation::get();
        $inscription = TypeFormation::get();
        return view('user.show', compact('typeFormation', 'formation', 'inscription'));
    }

    public function profil() {


        if (Auth::check()) {
            $typeFormation = TypeFormation::get();
            $formation = Formation::get();
            $inscription = TypeFormation::get();
            $domaine_id = Auth::user()->domaine_id;
            $level_id = Auth::user()->level_id;
            $pays_origin = Auth::user()->country_origin_id;
            $pays_residence = Auth::user()->country_residence_id;
            $role = Auth::user()->role;
            $domaines = Domaine::findOrFail($domaine_id)->name;
            $level = NiveauEtude::findOrFail($level_id)->name;
            $paysOrigin = Pays::findOrFail($pays_origin)->nom_fr_fr;
            $paysResidence = Pays::findOrFail($pays_residence)->nom_fr_fr;
            $statut = Statut::findOrFail($role)->name;
            $user = User::get();
            $domaine = Domaine::get();
            $aide = Aide::get();

            //trouver les domaines dans les quels j'ai proposé mon aide
             $domaine = Domaine::where( [$id]);
         
          
            return view('user.profil', compact('typeFormation', 'formation', 'inscription', 'domaines', 'level', 'paysOrigin', 'paysResidence', 'statut', 'domaine', 'use', 'aide'));
        }
        return view('errors.503');
    }

    public function recherche(Request $request) {


        //$user=User::where('email',$user)->first();
        //$user=$auth->user();
        if (Auth::check()) {
            // $user=User::where();

        
        $id=Auth::user()->id;
        $messagesRecive= Commun::msgRecive($id);
        $messagesSend= Commun::msgSend($id);
        $domaine=Domaine::get();

        //les domaines dans lequel j'aide
        $domaines= Commun::domainesAide($id);
           $user=User::get();
         $aide=Aide::where('user_id',$id)->get();
            $search = $request->get('search');
            $aide = Aide::get();
            $typeFormation = TypeFormation::get();
            $formation = Formation::get();
            $inscription = TypeFormation::get();
            //$listAmis=Amis::where('user_id',Auth::uesr()->id)->get();
            //rechercer de l'aide dans un domaine
            $domaines = Domaine::where('name', 'like', '%' . $search . '%')->get();
            $id=$request->user_id;
            $amis1=Amis::get();
            //trouvé ceux qui m'on effectuer une demande d'amitié
            $demandeAmis=    DB::table('users')
            ->whereExists(function ($query) use( $id)  {
            $query->select(DB::raw(1) )
                 ->from('amis')
                 ->whereRaw('users.id=amis.user_id and amis.confirm=0')
                 ->where('amis.freind_id', $id);
            })->get();
           
           //trouver la liste de mes amis 
            $listAmis=    DB::table('users')
            ->whereExists(function ($query) use( $id)  {
            $query->select(DB::raw(1) )
                  ->from('amis')
                  ->whereRaw('users.id=amis.freind_id and amis.confirm=1')
                  ->where('amis.user_id',$id);
     
            })->get();

            //trouver à qui j'ai faire une demande d'amitiée 
            $mesDemandeAmis=    DB::table('users')
            ->whereExists(function ($query) use( $id)  {
            $query->select(DB::raw(1) )
                  ->from('amis')
                  ->whereRaw('users.id=amis.freind_id and amis.confirm=0')
                  ->where('amis.user_id',$id);
     
            })->get();
               
             //trouver les domaines dans les quels j'ai proposé mon aide
             $domaine = DB::select('select * from aides ,users, domaines where  domaines.id=aides.domaine_id and aides.user_id=users.id and users.id = ?' , [$id]);
         
          
 
            

            return view('user.recherche', compact('typeFormation', 'formation', 'inscription', 'user', 'domaine', 'domaines', 'pays', 'aide', 'amis','listAmis','demandeAmis','mesDemandeAmis','messagesSend','messagesRecive'));
        }
        return view('errors.503');
    }

    public function showAide($id) {
        //si $id est un chiffre
        if (ctype_digit($id))
            if (Auth::check()) {
                $user_id = Auth::user()->id;
                $user = User::get();

                $pays = Pays::get();
                $aide = Aide::get();
                $typeFormation = TypeFormation::get();
                $formation = Formation::get();
                $inscription = TypeFormation::get();
                $domaineShow = Domaine::findOrFail($id);
                $domaine = Domaine::get();
                $messagesRecive= Commun::msgRecive($id);
               $messagesSend= Commun::msgSend($id);
               $user=User::get();
              $aide=Aide::where('user_id',$id)->get();


                return view('user.show-aide', compact('typeFormation', 'formation', 'inscription', 'user', 'domaineShow', 'domaine', 'pays', 'aide','messagesSend','messagesRecive'));
            }
        return view('errors.503');
    }

}

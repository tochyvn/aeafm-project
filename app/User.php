<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'sex','name','first_name', 'email', 'password','role','town','country_origin_id','country_residence_id','phone_number','level_id','domaine_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Aide()
{
    //relation entre formation et type de formation (1-n)
    return $this->hasMany('App\Aide');
}

}

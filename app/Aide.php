<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aide extends Model
{
	protected $fillable = [
       'domaine_id', 'user_id','description'
    ];

 public function User()
{
	//relation entre formation et type de formation (1-n)
	return $this->hasMany('App\User');
}
public function Domaine()
{
	//relation entre formation et type de formation (1-n)
	return $this->hasMany('App\Domaine');
}                                                                                                                                                  

}

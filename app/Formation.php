<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
	protected $fillable = [
       'type_id', 'name','dateStat', 'dateEnd','place','description'
    ];

 public function TypeFormation()
{
	//relation entre formation et type de formation (1-n)
	return $this->belongsTo('App\TypeFormation');
}

public function InscriptionModel()
{
	//relation entre formation et type de formation (1-n)
	return $this->hasMany('App\Formation');
}
 
}

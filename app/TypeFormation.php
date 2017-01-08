<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeFormation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];
public function InscriptionModel()
{
    //relation entre formation et type de formation (1-n)
    return $this->hasMany('App\Formation');
}
    public function Formation()
{
	//relation entre formation et type de formation (1-n)
  return	$this->hasMany('App\Formation');
}
}

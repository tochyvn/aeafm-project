<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function Aide()
	{
		//relation entre formation et type de formation (1-n)
		return $this->belongsTo('App\Aide');
	}
}

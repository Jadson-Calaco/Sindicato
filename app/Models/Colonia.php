<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
	protected $table='coloniaferias';
	public $timestamps = false;
    public function periodo()
    {
        return $this->belongsTo('App\Models\Periodo', 'periodo_id');
        
    }
    
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'user_id');
        
    }
}

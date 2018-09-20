<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipes extends Model
{
    protected $table='equipes';
    public $timestamps = false;
    
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'user_id');
        
    }
}

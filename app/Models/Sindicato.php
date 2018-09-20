<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sindicato extends Model
{
    protected $table='sindicato';
    public $timestamps = false;
    
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'user_id');
        
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anuncios extends Model
{
    protected $table='anuncios';
    public $timestamps = false;
    
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'user_id');
        
    }
}

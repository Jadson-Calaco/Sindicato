<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diretoria extends Model
{
    protected $table='diretoria';
    public $timestamps = false;
    
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'user_id');
        
    }
}

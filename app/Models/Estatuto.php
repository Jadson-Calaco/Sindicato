<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estatuto extends Model
{
    protected $table='estatuto';
    public $timestamps = false;
    
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'user_id');
        
    }
}

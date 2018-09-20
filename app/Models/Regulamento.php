<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regulamento extends Model
{
    protected $table='regulamento';
    public $timestamps = false;
    
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'user_id');
        
    }
}

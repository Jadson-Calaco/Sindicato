<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Albergue extends Model
{
    protected $table='albergue';
    public $timestamps = false;
    
    public function usuario()
    {
        return $this->belongsTo('App\User', 'user_id');
        
    }
}

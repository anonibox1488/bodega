<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bodegas extends Model
{
    protected $primaryKey = 'id';
    protected $table ="bodegas";
    protected $fillable = [
        'id', 'nombre', 'created_at', 'updated_at'
    ];

    
    public function producto(){
    	return $this->hasMany(producto::class);
	}
}

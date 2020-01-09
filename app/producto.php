<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $primaryKey = 'id';
    protected $table ="productos";
    protected $fillable = [
        'id', 'nombre', 'cantidad', 'estado', 'bodega_id', 'observacion',  'created_at', 'updated_at'
    ];

    public function bodega(){
    	return $this->belongsTo(bodegas::class, 'bodega_id');
	}

	public function getEstadoAttribute()
    {
        return ($this->attributes['estado'] == 1) ? 'Activo' : 'Inactivo';
    }

    public function scopeNombre($query, $nombre){
        if($nombre != ''){
            $query->where('nombre'  ,'LIKE', '%'.$nombre.'%');
            return $query;
        }
    }
}


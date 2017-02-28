<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title', 'description', 'picture','type','active', 'alt',
    ];
    
    public function scopeGetServices($query){
    	return $query
    		->where('type', 'services');
    }

    public function scopeGetWorks($query){
    	return $query
    		->where('type', 'work');
    }
    public function scopeGetSuperiorities($query){
    	return $query
    		->where('type', 'superiority');
    }
}

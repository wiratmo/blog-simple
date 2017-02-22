<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
    	'name', 
    	'contact', 
    	'message',
        'ipGuest',
    	];
    protected $hidden =[
    	'ipGuest',
    ];

    public function scopeValidateMessage($query, $ip, $date){
    	return $query 
    		->where('ipGuest',$ip)
    		->get();
    }
}

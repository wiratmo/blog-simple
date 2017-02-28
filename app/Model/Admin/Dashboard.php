<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $fillable = [
       'favicon','headIcon','headQuote','title','keyword','description','viewCount','lastIp','lasview','typingTextHead', 'map','address',
    ];
}

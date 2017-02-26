<?php

namespace App\Model\Blog;

use Illuminate\Database\Eloquent\Model;
use App\Model\Blog\Article;
use App\Model\Blog\Category;

class Tag extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'user_id','title', 'keyword', 'description','slug', 'deleted_at', 'importent',
    ];
    
    public function articles(){
    	return $this->belongsToMany(Article::class);
    }

    public function categories(){
    	return $this->belongsToMany(Category::class);
    }

    public function scopeGetIdTag($query, $slug){
    	return $query
    		->select('id')
    		->where('slug', $slug);
    }

    public function scopeGetSumTag($query){
        return $query->count();
    }

    public function scopeGetSelect2($query){
        return $query
            ->select('id', 'title as text')
            ->get();
    }

    public function scopeGetById($query, $id){
        return $query
            ->where('id', $id);
    }
}

<?php

namespace App\Model\Blog;

use Illuminate\Database\Eloquent\Model;
use App\Model\Blog\Tag;
use App\Model\Blog\Category;
use App\User;

class Article extends Model
{
    public function tags(){
    	return $this->belongsToMany(Tag::class);
    }

    public function categories(){
    	return $this->belongsToMany(Category::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function scopeGetByUserAndSlug($query, $user, $slug){
    	return $query
    		->join('users','users.id','articles.user_id')
            ->select('articles.*')
    		->where('users.name',$user)
    		->where('articles.slug', $slug);
    }

    public function scopeGetTagArticle($query, $user, $slug){
    	return $query
            ->join('users','users.id','articles.user_id')
            ->join('article_tag', 'article_tag.article_id', 'articles.id')
            ->join('tags', 'tags.id', 'article_tag.tag_id')
            ->select('tags.id')
            ->where('users.name',$user)
            ->where('articles.slug', $slug)
            ->get();
    }

    public function scopeGetSimiliarArticle($query, array $param, $id){
        return $query
            ->join('article_tag', 'article_tag.article_id', 'articles.id')
            ->join('tags', 'tags.id', 'article_tag.tag_id')
            ->select('articles.*')
            ->whereIn('tags.id', $param)
            ->where('articles.id', '<>', $id)
            ->get()
            ->groupBy('articles');
    }

    public function scopeGetArticleByCategory($query, $id){
        return $query
            ->join('article_category', 'article_category.article_id', 'articles.id')
            ->where('article_category.category_id', $id);
    }

    public function scopeGetArticleByTag($query, $id){
        return $query
            ->join('article_tag', 'article_tag.article_id', 'articles.id')
            ->where('article_tag.tag_id', $id);
    }
}

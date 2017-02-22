<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Blog\Category;
use App\Model\Blog\Article;
use App\Model\Blog\Tag;
use Carbon\Carbon;

class TagController extends Controller
{
    protected $category;
  	protected $dateNow;
    
  	public function __construct(){
  		$this->category 	= Category::getHitCategory();
  		$this->dateNow 		= Carbon::now()->toFormattedDateString();
  	}

    public function slug($slug){
    	$tag = Tag::getIdTag($slug);
    	if ($tag->count() == 0){
    		return view('errors.404');
    	} else{
    		$id 				= $tag->first()->id;
    		$data['articles'] 	= Article::getArticleByTag($id)->with('user', 'categories', 'tags')->orderBy('updated_at', 'desc')->get();
	    	$data['mostView'] 	= Article::with('user')->orderBy('viewCount', 'desc')->take(5)->get();
	    	$data['category'] 	= $this->category;
	    	$data['dateNow'] 	= $this->dateNow;
	    	$data['tags'] 		= Tag::with('articles')->take(10)->get();
	    	return view('dashboards.blog', $data);
    	}
    }
}

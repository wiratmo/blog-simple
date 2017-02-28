<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Blog\Category;
use App\Model\Blog\Article;
use App\Model\Blog\Tag;
use Carbon\Carbon;
use SEOMeta;
use OpenGraph;
use Twitter;

class CategoryController extends Controller
{
    protected $category;
    protected $dateNow;
    protected $url;
    
  	public function __construct(){
        $this->url = Request()->url();
  		$this->category 	= Category::getHitCategory();
  		$this->dateNow 		= Carbon::now()->toFormattedDateString();
  	}

    public function slug($slug){
    	$category = Category::getIdCategory($slug);
    	if ($category->count() == 0){
    		return view('errors.404');
    	} else{
        $value = $category->first();
        SEOMeta::setTitle('Blog Kaatas |'.$this->category);
        SEOMeta::setDescription($value->desription);
        SEOMeta::setKeywords($value->keyword);
        SEOMeta::setCanonical($this->url);

        OpenGraph::setDescription($value->desription);
        OpenGraph::setTitle('Blog Kaatas |'.$this->category);
        OpenGraph::setSiteName('kaatas.com');
        OpenGraph::setUrl($this->url);
        OpenGraph::addProperty('type', 'articles');

        Twitter::setTitle('Blog');
        Twitter::setSite($this->url);
        
    		$id 				= $category->first()->id;
    		$data['articles'] 	= Article::getArticleByCategory($id)->with('user', 'categories', 'tags')->orderBy('updated_at', 'desc')->get();
	    	$data['mostView'] 	= Article::with('user')->orderBy('viewCount', 'desc')->take(5)->get();
	    	$data['category'] 	= $this->category;
	    	$data['dateNow'] 	= $this->dateNow;
	    	$data['tags'] 		= Tag::with('articles')->take(10)->get();
	    	return view('dashboards.blog', $data);
    	}
    }

    public function check(){
      return Category::getHitCategory();
    }
}

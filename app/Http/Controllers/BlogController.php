<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Blog\Article;
use App\Model\Blog\Category;
use App\Model\Blog\Tag;
use Carbon\Carbon;
use Auth;

class BlogController extends Controller
{
  	protected $category;
  	protected $dateNow;
    
  	public function __construct(){
  		$this->category 	= Category::getHitCategory();
  		$this->dateNow 		= Carbon::now()->toFormattedDateString();
  	}
    public function index(){
    	$data['articles'] 	= Article::with('user', 'categories', 'tags')->orderBy('updated_at', 'desc')->get();
    	$data['mostView'] 	= Article::with('user')->orderBy('viewCount', 'desc')->take(5)->get();
    	$data['category'] 	= $this->category;
    	$data['dateNow'] 	= $this->dateNow;
    	$data['tags'] = Tag::with('articles')->take(10)->get();
    	return view('dashboards.blog', $data);
    }

    public function slug($user, $slug){
    	$article = Article::with('categories','tags', 'user')->getByUserAndSlug($user, $slug);
    	if ($article->count() == 0){
    		return view('errors.404');
       	}else{
       		$id 					    = $article->first()->id;
          $data['article']  = $article->get();
          $data['category'] = $this->category;
       		$data['similarArticle']	= $this->articleSimiliar($user, $slug, $id);
          return view('dashboards.detailBlog', $data);
          return dd($data);
       	}
    }

    public function articleSimiliar($user, $slug, $id){
    	$tag = Article::getTagArticle($user, $slug);
    	foreach ($tag as $t) {
    		$tags[] = $t->id;
    	}
    	return $similiar = Article::with('user')->getSimiliarArticle($tags, $id)->first();
    }
}

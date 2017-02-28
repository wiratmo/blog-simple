<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Blog\Article;
use App\Model\Blog\Category;
use App\Model\Blog\Tag;
use Carbon\Carbon;
use Auth;
use SEOMeta;
use OpenGraph;
use Twitter;

class BlogController extends Controller
{
    protected $category;
  	protected $url;
  	protected $dateNow;
    
  	public function __construct(){
      $this->url = Request()->url();
      $this->category   = Category::getHitCategory();
  		$this->dateNow 		= Carbon::now()->toFormattedDateString();
  	}
    public function index(){
      SEOMeta::setTitle('Blog Kaatas');
      SEOMeta::setDescription('Blog kaatas');
      SEOMeta::setKeywords('das,asjdka');
      SEOMeta::setCanonical($this->url);

      OpenGraph::setDescription('Blog kaatas');
      OpenGraph::setTitle('Blog Kaatas.com');
      OpenGraph::setSiteName('kaatas.com');
      OpenGraph::setUrl($this->url);
      OpenGraph::addProperty('type', 'articles');

      Twitter::setTitle('Blog');
      Twitter::setSite($this->url);

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
          $value = $article->get();

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

       		$id 					    = $article->first()->id;
          $data['article']  = $value;
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

    public function user($user){
      $article = Article::with('categories','tags','user')->getArticleByUser($user);
      if ($article->count() == 0){
        return view('errors.404');
        }else{
          $value = $article->first();
        SEOMeta::setTitle('Blog Kaatas |'.$this->category);
        SEOMeta::setDescription($value->desription);
        SEOMeta::setKeywords($value->keyword);

        OpenGraph::setDescription($value->desription);
        OpenGraph::setTitle('Blog Kaatas |'.$this->category);
        OpenGraph::setSiteName('kaatas.com');
        OpenGraph::setUrl('http://kaatas.com/blog');
        OpenGraph::addProperty('type', 'articles');

        Twitter::setTitle('Blog');
        Twitter::setSite('http://kaatas.com/blog');
          $id         = $article->first()->id;
        $data['articles']   = $article->get();
        $data['mostView']   = Article::with('user')->orderBy('viewCount', 'desc')->take(5)->get();
        $data['category']   = $this->category;
        $data['dateNow']  = $this->dateNow;
        $data['tags']     = Tag::with('articles')->take(10)->get();
        return view('dashboards.blog', $data);
        }
    }
}

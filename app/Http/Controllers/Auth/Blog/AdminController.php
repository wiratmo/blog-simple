<?php

namespace App\Http\Controllers\Auth\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\Blog\ArticleManage as ArticleManage;
use App\Model\Blog\Article;
use App\Model\Blog\Tag;
use App\Model\Blog\Category;
use App\User;
use Auth;

class AdminController extends Controller 
{
	protected $user;

	public function __construct(){
		$this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
	}

    public function index(){
    	$data['user'] = $this->user;
        $data['title'] = 'Dashboard';
        $data['countArticle'] = Article::getSumArticle()->first();
        $data['countArticleDraf'] = Article::getSumArticleByStatus('draf')->first();
        $data['countArticlePosted'] = Article::getSumArticleByStatus('posted')->first();
        $data['countCategory'] = Category::getSumCategory()->count();
        $data['countTag'] = Tag::getSumTag()->count();
        $data['countContributor'] = User::getSumContributor()->first();
        
        return view('auth.admin.blog.beranda', $data);
        return dd($data);
    }
}

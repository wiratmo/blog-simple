<?php

namespace App\Http\Controllers\Auth\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Blog\Article;
use App\Model\Blog\Tag;
use App\Model\Blog\Category;
use App\Http\Requests\Add\ABlog;
use App\Http\Requests\Edit\EBlog;
use App\User;
use Auth;

class BlogController extends Controller
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
        $data['title'] = 'Manage All Article';
        $data['articles'] = Article::with('user', 'categories', 'tags')->orderBy('status', 'desc')->get();
    	return view('auth.admin.blog.article', $data);
    }

    public function create(){
        $data['user'] = $this->user;
        $data['title'] = 'Manage Create Article';
        $data['type'] = 'create';
        $data['tags'] = Tag::getSelect2();
        $data['categories'] = Category::getSelect2();
        return view('auth.admin.blog.manage.article', $data);
    }

    public function store(ABlog $request){
        if($request->hasFile('header')){
            $header = $request->file('header')->getClientOriginalName() ;
        } else {
            $header = NULL;
        }

        $article = Article::create([
            'user_id' => $this->user->id,
            'title' => $request->title,
            'keyword' => $request->keyword,
            'description' => $request->description,
            'slug' => str_slug($request->title),
            'content' => $request->content,
            'header'=> $header
            ]);
        if ($request->has('tag')){
            $article->tags()->sync($request->tag);
        } 
        if ($request->has('category')){
            $article->categories()->sync($request->category);
        }
        return redirect()->route('manage.blog.dashboard');
    }

    public function edit($id){
        if ((Article::getById($id)->count()) == 0 ) {
            return view('errors.404');
        } else {
            $data['user'] = $this->user;
            $data['title'] = 'Manage Edit Article';
            $data['id'] = $id;
            $data['type'] = 'edit';
            $data['tags'] = Tag::getSelect2();
            $data['categories'] = Category::getSelect2();
            $data['values'] = Article::with('tags','categories')->getById($id)->first();
            return view('auth.admin.blog.manage.article', $data);
            return dd($data);
        }   
    }

    public function update(Eblog $request){
        if($request->hasFile('header')){
            $header = $request->file('header')->getClientOriginalName() ;
        } else {
            $header = NULL;
        }



        Article::where('id', $request->id)
            ->update([
            'user_id' => $this->user->id,
            'title' => $request->title,
            'keyword' => $request->keyword,
            'description' => $request->description,
            'slug' => str_slug($request->title),
            'content' => $request->content,
            'header'=> $header
            ]);
        
        $article = Article::find($request->id);
        if ($request->has('tag')){
            $article->tags()->sync($request->tag);
        } 
        if ($request->has('category')){
            $article->categories()->sync($request->category);
        }
        $article->update();

        return redirect()->route('manage.blog.dashboard');
    }

    public function delete(Request $request){
        $article = Article::find($request->id);
        $article->tags()->detach();
        $article->categories()->detach();
        $article->delete();
        return redirect()->route('manage.blog.dashboard');
    }
}

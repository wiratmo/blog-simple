<?php

namespace App\Http\Controllers\Auth\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Blog\Category;
use App\Model\Blog\Tag;
use App\Http\Requests\Add\ACategory;
use App\Http\Requests\Edit\ECategory;
use Auth;

class CategoryController extends Controller
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
    	$data['title'] = 'Manage Category Article';
    	$data['categories'] =  Category::all();
    	$data['tags'] = Tag::all();
    	return view('auth.admin.blog.categoryAndTag', $data);
    }

    public function create(){
        $data['user'] = $this->user;
        $data['type'] = 'create';
        $data['title'] = 'Create Category Article';
        return view('auth.admin.blog.manage.category', $data);
    }

    public function store(ACategory $request){
        Category::create([
            'user_id' => $this->user->id,
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'keyword' => $request->keyword,
            'description' => $request->description
            ]);
        return redirect()->route('manage.category.dashboard');
    }

    public function edit($id){
        if((Category::getById($id)->count())==0){
            return view('errors.404');
        } else {
            $data['id'] = $id;
            $data['user'] = $this->user;
            $data['type'] = 'edit';
            $data['title'] = 'Edit Category Article';
            $data['values'] = Category::getById($id)->first();
            return view('auth.admin.blog.manage.category', $data);    
        }
    }

    public function update(ECategory $request){
        Category::where('id', $request->id)
            ->update([
                'user_id' => $this->user->id,
                'title' => $request->title,
                'slug' => str_slug($request->title),
                'keyword' => $request->keyword,
                'description' => $request->description
                ]);
        return redirect()->route('manage.category.dashboard');
    }

    public function delete(Request $request){
        $category = Category::find($request->id);
        $category->articles()->detach();
        $category->delete();
        return redirect()->route('manage.category.dashboard');
    }
}

<?php

namespace App\Http\Controllers\Auth\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Blog\Tag;
use App\Http\Requests\Add\ACategory;
use App\Http\Requests\Edit\ECategory;

use Auth;

class TagController extends Controller
{
	protected $user;

	public function __construct(){
		$this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
	}

    public function create(){
    	$data['user'] = $this->user;
        $data['type'] = 'create';
        $data['title'] = 'Create Tag Article';
    	return view('auth.admin.blog.manage.tag', $data);
    }

    public function store(ACategory $request){
    	Tag::create([
            'user_id' => $this->user->id,
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'keyword' => $request->keyword,
            'description' => $request->description
            ]);
        return redirect()->route('manage.category.dashboard');
    }

    public function edit($id){
        if((Tag::getById($id)->count())==0){
            return view('errors.404');
        } else {
            $data['id'] = $id;
            $data['user'] = $this->user;
            $data['type'] = 'edit';
            $data['title'] = 'Edit Tag Article';
            $data['values'] = Tag::getById($id)->first();
            return view('auth.admin.blog.manage.tag', $data);    
        }
    }

    public function update(ECategory $request){
        Tag::where('id', $request->id)
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
    	$tag = Tag::find($request->id);
        $tag->articles()->detach();
        $tag->delete();
        return redirect()->route('manage.category.dashboard');
    }
}

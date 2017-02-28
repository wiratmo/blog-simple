<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Admin\Dashboard;
use App\Model\Admin\Service;
use Auth;

class DashboardController extends Controller
{
	protected $user;

	public function __construct(){
		$this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
	}

    public function home(){
    	$data['user'] = $this->user;
        $data['title'] = 'Welcome to Admin Dashboard';
        $data['dashboard'] = Dashboard::first();
        $data['sector'] = '';
        return view('auth.admin.dashboard.home', $data);
        return dd($data);
    }

    public function services(){

        $data['user'] = $this->user;
        $data['title'] = 'Welcome to Admin Dashboard';
        $data['services'] = Service::getServices()->get();
        $data['works'] = Service::getWorks()->get();
        $data['superiorities'] = Service::getSuperiorities()->get();
        $data['type'] = '';
        return view('auth.admin.dashboard.services', $data);
        return dd($data);
    }

    public function editsector($sector){
        $data['user'] = $this->user;
        $data['title'] = 'Welcome to Admin Dashboard';
        $data['dashboard'] = Dashboard::first();
        $data['sector'] = $sector;
        return view('auth.admin.dashboard.home', $data);
    }

    public function updatesector(Request $request){
        switch ($request->sector) {
            case 'favicon':
                $data = $request->favicon;
                break;
            case 'headIcon':
                $data = $request->headIcon;
                break;
            case 'headQuote':
                $data = $request->headQuote;
                break;
            case 'typingTextHead':
                $data = $request->typingTextHead;
                break;
            case 'title':
                $data = $request->title;
                break;
            case 'keyword':
                $data = $request->keyword;
                break;
            case 'description':
                $data = $request->keyword;
                break;
            case 'maps':
                $data = $request->map;
                break;    
            default:
                return view('errors.404');
        };
        if($request->sector != 'maps'){
            Dashboard::whereId($request->id)
            ->update([
                $request->sector => $data,
            ]);
        } else {
            Dashboard::whereId($request->id)
            ->update([
                'map' => $data,
                'address' => $request->address,
                ]);
        }
        

        return redirect()->route('manage.dashboard');
    }

    public function create($category){
        $data['user'] = $this->user;
        $data['title'] = 'Welcome to Admin Dashboard';
        $data['category'] = $category;
        $data['type'] = 'create';
        $data['services'] = Service::getServices()->get();
        $data['works'] = Service::getWorks()->get();
        $data['superiorities'] = Service::getSuperiorities()->get();

        return view('auth.admin.dashboard.services', $data);
    }

    public function edit($category, $id){
        $data['user'] = $this->user;
        $data['title'] = 'Welcome to Admin Dashboard';
        $data['value'] = Service::findOrFail($id);
        $data['type'] = 'edit';
        $data['category'] = $category;
        $data['services'] = Service::getServices()->get();
        $data['works'] = Service::getWorks()->get();
        $data['superiorities'] = Service::getSuperiorities()->get();

        return view('auth.admin.dashboard.services', $data);
        return dd($data);
    }

    public function store (Request $request, $category){
        if($request->hasFile('picture')){
            $picture = $request->file('picture')->getClientOriginalName() ;
        } else {
            $picture = NULL;
        }
        $service = Service::create([
            'title'=> $request->title,
            'description' => $request->description,
            'type' => $request->category,
            'picture' => $picture,
            'alt' => str_limit($request->description, 100),
            ])->toSql();
        return redirect()->route('manage.service');
    }

    public function update(Request $request, $category, $id){
        if($request->hasFile('picture')){
            $picture = $request->file('picture')->getClientOriginalName() ;
        } else {
            $picture = '';
        }
        Service::where('id', $request->id)
            ->update([
            'title'=> $request->title,
            'description' => $request->description,
            'picture' => $picture,
            'type' => $request->category,
            'alt' => str_limit($request->description, 100),
            ]);
        return redirect()->route('manage.service');
    }

    public function delete($id, Request $request){
        $service = Service::findOrFail($request->id);
        $service->delete();
        return redirect()->route('manage.service');
    }
}

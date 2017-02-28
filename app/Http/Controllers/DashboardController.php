<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostPesanDashboardRequest;
use App\Model\Message;
use App\Model\Admin\Dashboard;
use App\Model\Admin\Service;
use Carbon\Carbon;
use SEOMeta;
use OpenGraph;
use Twitter;

class DashboardController extends Controller
{
    protected $ip;
	protected $url;
	protected $date;

	public function __construct(){
        $this->ip = Request()->ip();
		$this->url = Request()->url();
		$this->date = Carbon::now();
	}

	public function index(){
        $dashboard = Dashboard::first();

        SEOMeta::setTitle($dashboard->title);
        SEOMeta::setDescription($dashboard->description);
        SEOMeta::setKeywords($dashboard->keyword);
        SEOMeta::setCanonical($this->url);

        OpenGraph::setDescription($dashboard->description);
        OpenGraph::setTitle($dashboard->title);
        OpenGraph::setSiteName('kaatas.com');
        OpenGraph::setUrl($this->url);
        OpenGraph::addProperty('type', 'articles');

        Twitter::setTitle('Beranda');
        Twitter::setSite($this->url);

        $data['dashboard'] = $dashboard;
        $data['services'] = Service::getServices()->get();
        $data['works'] = Service::getWorks()->get();
        $data['superiorities'] = Service::getSuperiorities()->get();
		return view('dashboards.beranda', $data);
	}

    public function postPesan(PostPesanDashboardRequest $request){
    	$check = Message::validateMessage($this->ip)->count();
    	if($check >= 5){
    		return redirect('/')->with('error','maaf pesan anda sudah melebihi batas');
    	}
    	Message::create([
    		'name' 		=> $request->name,
    		'contact' 	=> $request->contact,
    		'message'	=> $request->message,
    		'ipGuest'	=> $this->ip
    		]);
    	return redirect('/')->with('success','pesan anda telah kami terima dan akan dibalas melalui email atau ponsel');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostPesanDashboardRequest;
use App\Model\Message;
use Carbon\Carbon;

class DashboardController extends Controller
{
	protected $ip;
	protected $date;

	public function __construct(){
		$this->ip = Request()->ip();
		$this->date = Carbon::now();
	}

	public function index(){
		return view('dashboards.beranda');
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

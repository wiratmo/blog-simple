<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class UploadImageController extends Controller
{
    public function upload(Request $request){
    	if($request->hasFile('file')){
            Storage::disk('public')->put($request->file('file')->getClientOriginalName(), file_get_contents($request->file('file'))); 
            return 'public/'.$request->file('file')->getClientOriginalName();

    	} else {
    		exit();
    	}
    }
}

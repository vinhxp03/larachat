<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Events\RedisEvent;

class RedisController extends Controller
{
    public function index()
    {
    	// Messages::truncate(); die();
    	$messages = Messages::all();//->sortByDesc('created_at');
    	return view('message', compact('messages'));
    }

    public function sendMessage(Request $req)
    {
    	$messages = Messages::create($req->all());

    	event(
    		$e = new RedisEvent($messages)
    	);
    	return redirect()->back();
    }
}

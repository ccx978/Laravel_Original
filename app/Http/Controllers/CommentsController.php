<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Redirect, Input;

class CommentsController extends Controller
{
    //
    public function store()
    {
    	if (Comment::create(Input::all())) {
    		return Redirect::back();
    	} else {
    		return Redirect::back()->withInput()->withErrors('Comment publish
    			fail!');
    	}
    }
}

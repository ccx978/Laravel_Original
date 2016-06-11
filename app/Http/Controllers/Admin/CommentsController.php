<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    //
    public function index()
    {
    	return view('admin.comments.index')->withComments(Comment::all());
    }
    public function edit($id)
    {
    	return view('admin.comments.edit')->withComment(Comment::find($id));
    }
    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'nickname' => 'required',
    		'content' => 'required',
    		]);
    	if (Comment::where('id', $id)->update(Input::except(['_method',
    		'_token']))) {
    		return Redirect::to('admin/comments');
           } else {
    	     return Redirect::back()->withInput()->withErrors('Update Fail!');
           }
    }
    public function destroy($id)
    {
    	$comment = Comment::find($id);
    	$comment->delete();
    	return Redirect::to('admin/comments');
    }
}

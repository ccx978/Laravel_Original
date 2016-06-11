<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use Redirect, Input, Auth;

class ArticlesController extends Controller
{
    //
    public function index()
	{
		return view('admin.articles.index')->withArticles(Article::all());
	}

	public function create()
	{
		return view('admin.articles.create');
	}

	public function store(Request $request)
	{
		$this->validate($request,['title' => 'required|unique:articles|max:255',
			                       'body' => 'required',]);

		$article = new Article();
		$article->title = Input::get('title');
		$article->body = Input::get('body');
		$article->user_id = 1;//Auth::user()->id;


		if ($article->save()) {
		return Redirect::to('admin/articles');
		} else {
		return Redirect::back()->withInput()->withErrors('Save Error!');
		}
	}

	public function edit($id)
	{
		return view('admin.articles.edit')->withArticles(Article::find($id));
	}

	public function update(Request $request,$id)
	{
		$this->validate($request, [
		'title' => 'required|unique:articles,title,'.$id.'|max:255',
		'body' => 'required',
		]);
		$article = Article::find($id);
		$article->title = Input::get('title');
		$article->body = Input::get('body');
		$article->user_id = 1;//Auth::user()->id;
		if ($article->save()) {
		return Redirect::to('admin/articles');
		} else {
		return Redirect::back()->withInput()->withErrors('Save Error!');
		}
	}

	public function destroy($id)
	{
		$article = Article::find($id);
		$article->delete();
		return Redirect::to('admin/articles');
	}
}

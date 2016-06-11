<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

class ArticlesController extends Controller
{
    //
    public function show($id)
	{
		return view('articles.show')->withArticle(Article::find($id));
	}
}

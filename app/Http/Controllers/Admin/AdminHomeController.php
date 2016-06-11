<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Page;
use App\Article;

class AdminHomeController extends Controller
{
    //
    public function index()
	{
		return view('AdminHome')->withPages(Page::all())->withArticles(Article::all());
	}
}

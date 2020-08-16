<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    //
	public function index(){
		$post=DB::table("posts")->join('categories',"posts.category_id","categories.id")->select("posts.*","categories.name")->paginate(1);
		return view("pages.index",compact('post'));
	}
}

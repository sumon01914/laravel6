<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    //
	 public function WritePost(){
		 $categories=DB::table("categories")->get();
		 //return response()->json($category);
		return view("posts.writepost",compact('categories'));
	}
	public function StorePost(Request $req){
		//echo "ssss";
		 $validatedData = $req->validate([
			'title' => 'required|unique:posts|max:25|min:4',
			'details' => 'required',
			'category_id' => 'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);
		//return response()->json($validatedData);
		$image=$req->file("image");
		if($image){
			$image_name=time();
			 $ext =strtolower($image->getClientOriginalExtension());
			 $image_full_name=$image_name.".".$ext;
			 $upload_path="public/frontend/postimage/";
			 $image_url=$upload_path.$image_full_name;
			 $success=$image->move($upload_path, $image_full_name);
			 $data=array("title"=>$req->title,"details"=>$req->details,"category_id"=>$req->category_id,'image'=>$image_url);
			 $insert=DB::table("posts")->insert($data);
			 $notify=array("message"=>"successfully done");
			 return redirect()->route("category.all")->with($notify);

  
		}
		else{
			
		}
	} 
	public function AllPost(){
		//$post=DB::table('posts')->get();
		$post=DB::table("posts")->join("categories","posts.category_id","categories.id")->select("posts.*","categories.name as cat_name")->get();
		//return Response()->json($post);
		return view("posts.allpost",compact('post'));
	}
	public function ViewPost($id){
		$post=DB::table("posts")->join("categories","posts.category_id","categories.id")->select("posts.*","categories.name as cat_name")->where("posts.id",$id)->first();
		//return Response()->json($post);
		return view("posts.viewpost",compact('post'));
	}
	public function EditPost($id){
		$cat=DB::table("categories")->get();
		$post=DB::table("posts")->where("id",$id)->first();
		return view("posts.editpost",compact('post','cat'));
	}
	public function UpdatePost(Request $req,$id){
		//echo "ssss";
		 $validatedData = $req->validate([
			'title' => 'required|unique:posts|max:25|min:4',
			'details' => 'required',
			'category_id' => 'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);
		//return response()->json($validatedData);
		$image=$req->file("image");
		if($image){
			$image_name=time();
			 $ext =strtolower($image->getClientOriginalExtension());
			 $image_full_name=$image_name.".".$ext;
			 $upload_path="public/frontend/postimage/";
			 $image_url=$upload_path.$image_full_name;
			 $success=$image->move($upload_path, $image_full_name);
			 $data=array("title"=>$req->title,"details"=>$req->details,"category_id"=>$req->category_id,'image'=>$image_url);
			 $insert=DB::table("posts")->where("id",$id)->update($data);
			 $notify=array("message"=>"successfully done");
			 return redirect()->route("category.all")->with($notify);

  
		}
		else{
			
		}
	}
	public function DeletePost($id){
		$post=DB::table("posts")->where("id",$id)->first();
		@unlink($post->image);
		if(DB::table("posts")->where("id",$id)->delete()){
			$notify=array("message"=>"Successfully Deleted");
			return redirect()->route("all.post")->with($notify);
		}
		else{
			$notify=array("message"=>"Soemthing was wrong");
			return redirect()->route("all.post")->with($notify);
		}
	}
}

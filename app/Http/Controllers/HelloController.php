<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HelloController extends Controller
{
    public function about(){
		return view("pages.about");
	}
	 public function contact(){
		return view("pages.contact");
	}
	
	public function AddCategory(){
		return view("posts.add_category");
	}
	public function StoreCategory(Request $req){
		$validatedData = $req->validate([
			'name' => 'required|unique:categories|max:25|min:4',
			'slug' => 'required|unique:categories|max:25|min:4',
		]);
		$data=array('name'=>$req->name,'slug'=>$req->slug);
		//return response()->json($data);
		$category=DB::table("categories")->insert($data);
		if($category){
			$not=array(
						'message'=>'Successfully Done'
					);
			return redirect()->back()->with($not);
		}
		else{
			$not=array(
						'message'=>'SOmething was wrong'
					);
			return redirect()->back()->with($not);
		}
	}
	public function Showcategory(){
		$category=DB::table("categories")->get();
		return view("posts.show_category",compact('category'));
		
	}
	public function ViewCategory($id){
		$category=DB::table('categories')->where('id',$id)->first();
		//return response()->json($category);
		return view("posts.view_category")->with('cat',$category);
	}
	function DeleteCategory($id){
		$del=DB::table('categories')->where('id',$id)->delete();
		if($del){
			$not=array(
						'message'=>'Successfully Deleted'
					);
			return redirect()->back()->with($not);
		}
		else{
			$not=array(
						'message'=>'SOmething was wrong'
					);
			return redirect()->back()->with($not);
		}
	}
	public function EditCategory($id){
		$cat=DB::table("categories")->where("id",$id)->first();
		return view("posts.edit_category")->with("cat",$cat);
	}
	function UpdateCategory(Request $req,$id){
		$validatedData = $req->validate([
			'name' => 'required|max:25|min:4',
			'slug' => 'required|max:25|min:4',
		]);
		$data=array('name'=>$req->name,'slug'=>$req->slug);
		$update=DB::table("categories")->where("id",$id)->update($data);
		//return response()->json($data);exit;
		if($update){
			$notify=array("message"=>"Updated Successfully");
			return redirect()->route("category.all")->with($notify);
		}
		else{
			$notify=array("message"=>"Nothing to update");
			return redirect()->back()->with($notify);
		}
		
	}
	
}

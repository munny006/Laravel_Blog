<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadControlller;


use DB;
use Session;

class makeController extends Controller

{

	public function welcome(){
		return view('welcome');
	}
	public function about(){
		return view('pages.about');
	}
	public function contact(){
		return view('pages.contact');
	}
	public function writepost(){
		$category=DB::table('make')->get();
		return view('posts.writepost',compact('category'));
	}
	public function AddCategory(){
		return view('posts.add_category');
	}

//insert Data
	public function StoreCategory(Request $request){
		$validated = $request->validate([
			'name' => 'required',
			'slug' => 'required',
		]);

		$data=array();
		$data['name']=$request->name;
		$data['slug']=$request->slug;
		$category=DB::table('make')->insert($data);
		if ($category) {
			Session::flash('success','Data successfully inserted!');
			return Redirect()->route('welcome');
		}
		else{
			Session::flash('error','Data Not inserted!');
		}

	}

	public function AllCategory(){
		$category=DB::table('make')->get();
		return view('posts.all_category',compact('category'));
	}

	public function viewCategory($id){
		$category=DB::table('make')->where('id',$id)->first();
		return view('posts.categoryview',compact('category'));
	}


	public function deleteCategory($id){
		$category=DB::table('make')->where('id',$id)->delete();
		if ($category) {
			Session::flash('success','Data successfully Deleted!');
			return Redirect()->route('all.category');
		}
		else{
			Session::flash('error','Data Not Deleted!');
		}

	}

	public function editCategory($id){
		$category=DB::table('make')->where('id',$id)->first();
		return view('posts.editcategory',compact('category'));
	}
	public function updateCategory(Request $request,$id){
		$validated = $request->validate([
			'name' => 'required',
			'slug' => 'required',
		]);

		$data=array();
		$data['name']=$request->name;
		$data['slug']=$request->slug;
		$category=DB::table('make')->where('id',$id)->update($data);
		if ($category) {
			Session::flash('success','Data successfully updateed!');
			return Redirect()->route('all.category');
		}
		else{
			Session::flash('error','Data Not updateed!');
		}

	}
	public function Storepost(Request $request){
		

		$data=array();
		$data['title']=$request->title;
		$data['category_id']=$request->category_id;
		$data['details']=$request->details;
		$image=$request->file('image');
		if ($image) {
			$image_name =str::random(5);
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name=$image_name.'.'.$ext;
			$upload_path='public/image/';
			$image_url=$upload_path.$image_full_name;
			$image->move($upload_path,$image_full_name);
			$data['image']=$image_url;
			DB::table('post')->insert($data);
			Session::flash('success','Post Data successfully updateed!');
			return Redirect()->route('all.category');
			
		}
		else{
			DB:: table('post')->insert($data);
			Session::flash('success','Post Data successfully updateed!');
			return Redirect()->route('all.category');
		}
	}
	public function Allpost(){
		
		$category=DB::table('post')
		->join('make','post.category_id','make.id')
		->select('post.*','make.name')
		->get();
		return view('posts.allpost',compact('category'));
		
	}

	public function viewpost($id){
		$post=DB:: table('post')
		->join('make','post.category_id','make.id')
		->select('post.*','make.name')
		->where('post.id',$id)
		->first();
		return view('posts.viewpost',compact('post'));


	}
	public function deletepost($id){
		$post = DB::table('post')->where('id',$id)->first();
		$image=$post->image;
		$delete=DB::table('post')->where('id',$id)->delete();
		if ($delete) {
		unlink($image);
		Session::flash('success','Post Data successfully updateed!');
			return Redirect()->route('all.post');

		}
		else{
			Session::flash('success','Post Data successfully updateed!');
			return Redirect()->route('all.post');
		}
	}

	public function editpost($id){
		$category=DB::table('make')->get();
		$post = DB::table('post')->where('id',$id)->first();
		return view('posts.editpost',compact('category','post'));
	}

	public function updatepost(Request $request,$id){
		
			$data=array();
		$data['title']=$request->title;
		$data['category_id']=$request->category_id;
		$data['details']=$request->details;
		$image=$request->file('image');
		if ($image) {
			$image_name =str::random(5);
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name=$image_name.'.'.$ext;
			$upload_path='public/image/';
			$image_url=$upload_path.$image_full_name;
			$image->move($upload_path,$image_full_name);
			$data['image']=$image_url;
			unlink($request->old_photo);
			DB::table('post')->where('id',$id)->update($data);
			Session::flash('success','Post Data successfully updateed!');
			return Redirect()->route('all.post');
			
		}
		else{
			$data['image']=$request->image;
			DB::table('post')->where('id',$id)->update($data);
			Session::flash('success','Post Data successfully updateed!');
			return Redirect()->route('all.post');
		}
	}


	public function index(){
		$post = DB::table('post')->join('make','post.category_id','make.id')
		->select('post.*','make.name','make.slug')
		->SimplePaginate(2); 
		//->get();
		return view('pages.index',compact('post'));
	}

}

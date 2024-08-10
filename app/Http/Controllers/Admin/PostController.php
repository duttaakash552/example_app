<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function index() {
		$categories = DB::table('category_posts')->where('status', 'active')->get();
		$settings = DB::table('settings')->first();
		return view('admin.post.add', compact('categories', 'settings'));
	}
	
	public function insert(Request $request) {
		if(!empty($request->category)) {
			$data = array();
			$str = $request->name;
			$delimiter = '-';
			$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
			$is_slug_exist = DB::table('posts')->where('slug', $slug)->where('status', '<>', 'deleted')->value('slug');
			if(!empty($is_slug_exist)) {
				$length = 6;
				
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
				// Initialize a variable to store the random string
				$randomString = '';

				// Generate random bytes and convert them to string
				$bytes = random_bytes($length);
				
				// Loop through each byte and convert to character from the list
				for ($i = 0; $i < $length; $i++) {
					// Get a random index from 0 to the length of $characters - 1
					$randomString .= $characters[ord($bytes[$i]) % strlen($characters)];
				}
				
				$slug = $slug.'-'.$randomString;
			}
			
			$data = [
				'name' => $request->name,
				'slug' => $slug,
				'category' => implode(',', $request->category),
				'description' => $request->editor_content,
				'updated_by' => auth()->user()->id,
				'status' => 'active',
				'created_at' => $request->published_date,
				'updated_at' => DB::raw('NOW()')
			];
			
			if($request->hasFile('image'))
			{
				$allowedfileExtension=['jpg', 'jpeg', 'png'];
				$extension = $request->image->extension();
				$check=in_array($extension,$allowedfileExtension);
				if($check) {
					if($request->image->getSize() <= 1048576) {
						$imageName = 'post_'.time().'.'.$request->image->extension();
						$request->image->move(public_path('uploads/post'), $imageName);
						$data = [
							'image' => $imageName
							]+$data;
					}else {
						return redirect()->back()->with('success_message', 'File size can not be more than 1 MB');
					}
				}else {
					return redirect()->back()->with('success_message', 'Only jpg, jpeg & png formats are allowed');
				}
			}
			
			if($request->hasFile('banner_image'))
			{
				$allowedfileExtension=['jpg', 'jpeg', 'png'];
				$extension = $request->banner_image->extension();
				$check=in_array($extension,$allowedfileExtension);
				if($check) {
					if($request->banner_image->getSize() <= 1048576) {
						$imageName = 'banner_image_'.time().'.'.$request->banner_image->extension();
						$request->banner_image->move(public_path('uploads/post'), $imageName);
						$data = [
							'banner_image' => $imageName
							]+$data;
					}else {
						return redirect()->back()->with('success_message', 'File size can not be more than 1 MB');
					}
				}else {
					return redirect()->back()->with('success_message', 'Only jpg, jpeg & png formats are allowed');
				}
			}
			
			try {
				DB::table('posts')->insert($data);
				$post_details = DB::table('posts')->where('slug', $slug)->first();
				$selected_category = $request->category;
				for($i = 0; $i < count($selected_category); $i++) {
					$data = [
						'category_id' => $selected_category[$i],
						'post_id' => $post_details->id,
						'updated_by' => auth()->user()->id,
						'created_at' => DB::raw('NOW()'),
						'updated_at' => DB::raw('NOW()')
					];
					DB::table('category_post_tbls')->insert($data);
				}
				return redirect()->back()->with('success_message', 'Post added successfully');
			}catch(\Exception $e) {
				return redirect()->back()->with('success_message', $e->getMessage());
			}
		}else {
			return redirect()->back()->with('success_message', 'Please select category');
		}
	}
	
	public function list() {
		$posts = DB::table('posts')
					->select('posts.*', 'users.name as author')
					->leftJoin('users', 'users.id', '=', 'posts.updated_by')
					->where('status', '<>', 'deleted')
					->get();
		$categories = DB::table('category_posts')->where('status', '<>', 'deleted')->get();
		$settings = DB::table('settings')->first();
		return view('admin.post.list', compact('posts', 'categories', 'settings'));
	}
	
	public function edit($id) {
		$categories = DB::table('category_posts')->where('status', 'active')->get();
		$categories_elements = DB::table('post_meta_elements')->where('post_id', $id)->where('post_type', 'post')->first();
		$custom_fields = DB::table('post_metas')->where('post_id', $id)->where('post_type', 'post')->get();
		$post = DB::table('posts')->where('id', $id)->first();
		$category_arr = explode(',', $post->category);
		$settings = DB::table('settings')->first();
		return view('admin.post.edit', compact('categories', 'post', 'category_arr', 'categories_elements', 'custom_fields', 'settings'));
	}
	
	public function update(Request $request, $id) {
		$data = array();
		/*$str = $request->name;
		$delimiter = '-';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
		$is_slug_exist = DB::table('posts')
								->where('id', '<>', $id)
								->where('slug', $slug)
								->where('status', '<>', 'deleted')
								->value('slug');
		
		if(!empty($is_slug_exist)) {
			$length = 6;
			
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

			// Initialize a variable to store the random string
			$randomString = '';

			// Generate random bytes and convert them to string
			$bytes = random_bytes($length);
			
			// Loop through each byte and convert to character from the list
			for ($i = 0; $i < $length; $i++) {
				// Get a random index from 0 to the length of $characters - 1
				$randomString .= $characters[ord($bytes[$i]) % strlen($characters)];
			}
			
			$slug = $slug.'-'.$randomString;
		}*/
		$is_slug_exist = DB::table('posts')
								->where('id', '<>', $id)
								->where('slug', $request->slug)
								->where('status', '<>', 'deleted')
								->value('slug');
		if(empty($is_slug_exist)) {
			$data = [
				'name' => $request->name,
				'slug' => $request->slug,
				'category' => implode(',', $request->category),
				'description' => $request->editor_content,
				'status' => $request->status,
				'updated_by' => auth()->user()->id,
				'updated_at' => DB::raw('NOW()')
			];
			
			if($request->add_remove_post_image == 1) {
				$data = [
					'image' => null
				]+$data;
			}
			
			$posts = DB::table('posts')->where('id', $id)->first();
			if($request->hasFile('image'))
			{
				$allowedfileExtension=['jpg', 'jpeg', 'png'];
				$extension = $request->image->extension();
				$check=in_array($extension,$allowedfileExtension);
				if($check) {
					if($request->image->getSize() <= 1048576) {
						$filePath = public_path('uploads/post').'/'.$posts->image;
						//unlink($filePath);
						$imageName = 'post_'.time().'.'.$request->image->extension();
						$request->image->move(public_path('uploads/post'), $imageName);
						$data = [
							'image' => $imageName
							]+$data;
					}else {
						return redirect()->back()->with('success_message', 'File size can not be more than 1 MB');
					}
				}else {
					return redirect()->back()->with('success_message', 'Only jpg, jpeg & png formats are allowed');
				}
			}
			
			if($request->add_remove_post_banner_image == 1) {
				$data = [
					'banner_image' => null
				]+$data;
			}
			
			if($request->hasFile('banner_image'))
			{
				$allowedfileExtension=['jpg', 'jpeg', 'png'];
				$extension = $request->banner_image->extension();
				$check=in_array($extension,$allowedfileExtension);
				if($check) {
					if($request->banner_image->getSize() <= 1048576) {
						$filePath = public_path('uploads/post').'/'.$posts->banner_image;
						//unlink($filePath);
						$imageName = 'banner_image_'.time().'.'.$request->banner_image->extension();
						$request->banner_image->move(public_path('uploads/post'), $imageName);
						$data = [
							'banner_image' => $imageName
							]+$data;
					}else {
						return redirect()->back()->with('success_message', 'File size can not be more than 1 MB');
					}
				}else {
					return redirect()->back()->with('success_message', 'Only jpg, jpeg & png formats are allowed');
				}
			}
			
			try {
				DB::table('posts')
						->where('id', $id)
						->update($data);
				DB::table('category_post_tbls')->where('post_id', $posts->id)->delete();
				if($request->status != 'deleted') {
					$selected_category = $request->category;
					for($i = 0; $i < count($selected_category); $i++) {
						$data = [
							'category_id' => $selected_category[$i],
							'post_id' => $posts->id,
							'updated_by' => auth()->user()->id,
							'created_at' => DB::raw('NOW()'),
							'updated_at' => DB::raw('NOW()')
						];
						DB::table('category_post_tbls')->insert($data);
					}
				}
						
				return redirect()->back()->with('success_message', 'Post updated successfully');
			}catch(\Exception $e) {
				return redirect()->back()->with('success_message', $e->getMessage());
			}
		}else {
			return redirect()->back()->with('success_message', 'Post slug already exists');
		}
	}
}

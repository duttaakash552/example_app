<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PageController extends Controller
{
    public function list() {
		$pages = DB::table('pages')->where('status', '<>', 'deleted')->get();
		$settings = DB::table('settings')->first();
		return view('admin.page.list', compact('pages', 'settings'));
	}
	
	public function create() {
		$templates = DB::table('templates')->get();
		$pages = DB::table('pages')->where('status', '<>', 'deleted')->get();
		$settings = DB::table('settings')->first();
		return view('admin.page.add', compact('templates', 'pages', 'settings'));
	}
	
	public function insert(Request $request) {
		$data = array();
		$str = $request->title;
		$delimiter = '-';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
		$is_slug_exist = DB::table('pages')->where('slug', $slug)->where('status', '<>', 'deleted')->value('slug');
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
			'parent_id' => $request->parent_id,
			'title' => $request->title,
			'slug' => $slug,
			'template' => $request->template,
			'description' => $request->description,
			'ckeck_menu' => ((isset($request->ckeck_menu)) ? $request->ckeck_menu : '0'),
			'updated_by' => auth()->user()->id,
			'status' => 'active',
			'created_at' => DB::raw('NOW()'),
			'updated_at' => DB::raw('NOW()')
		];
		
		if($request->hasFile('image'))
		{
			$allowedfileExtension=['jpg', 'jpeg', 'png'];
			$extension = $request->image->extension();
			$check=in_array($extension,$allowedfileExtension);
			if($check) {
				if($request->image->getSize() <= 1048576) {
					$imageName = 'page_'.time().'.'.$request->image->extension();
					$request->image->move(public_path('uploads/page'), $imageName);
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
		
		try {
			DB::table('pages')->insert($data);
			return redirect()->back()->with('success_message', 'Page added successfully');
		}catch(\Exception $e) {
			return redirect()->back()->with('success_message', $e->getMessage());
		}
	}
	
	public function edit($id) {
		$categories_elements = DB::table('post_meta_elements')->where('post_id', $id)->where('post_type', 'page')->first();
		$custom_fields = DB::table('post_metas')->where('post_id', $id)->where('post_type', 'page')->get();
		$page = DB::table('pages')->where('id', $id)->first();
		$templates = DB::table('templates')->get();
		$pages = DB::table('pages')->where('id', '<>', $id)->where('status', '<>', 'deleted')->get();
		$settings = DB::table('settings')->first();
		return view('admin.page.edit', compact('page', 'templates', 'pages', 'categories_elements', 'custom_fields', 'settings'));
	}
	
	public function update(Request $request, $id) {
		$data = array();
		$slug = $request->slug;
		$is_slug_exist = DB::table('pages')
								->where('id', '<>', $id)
								->where('slug', $slug)
								->where('status', '<>', 'deleted')
								->value('slug');
								
		if(!empty($is_slug_exist)) {
			return redirect()->back()->with('success_message', 'This url already exists');
		}
		/*$str = $request->title;
		$delimiter = '-';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
		$is_slug_exist = DB::table('pages')
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
		
		$data = [
			'parent_id' => $request->parent_id,
			'title' => $request->title,
			'slug' => $request->slug,
			'template' => $request->template,
			'description' => $request->description,
			'ckeck_menu' => ((isset($request->ckeck_menu)) ? $request->ckeck_menu : '0'),
			'disable_link' => ((isset($request->disable_link)) ? $request->disable_link : '0'),
			'updated_by' => auth()->user()->id,
			'status' => $request->status,
			'updated_at' => DB::raw('NOW()')
		];
		
		if($request->add_remove_post_image == 1) {
			$data = [
				'image' => null
			]+$data;
		}
		
		$page = DB::table('pages')->where('id', $id)->first();
		if($request->hasFile('image'))
		{
			$allowedfileExtension=['jpg', 'jpeg', 'png'];
			$extension = $request->image->extension();
			$check=in_array($extension,$allowedfileExtension);
			if($check) {
				if($request->image->getSize() <= 1048576) {
					$filePath = public_path('uploads/page').'/'.$page->image;
					//unlink($filePath);
					$imageName = 'page_'.time().'.'.$request->image->extension();
					$request->image->move(public_path('uploads/page'), $imageName);
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
		
		try {
			DB::table('pages')
					->where('id', $id)
					->update($data);
					
			return redirect()->back()->with('success_message', 'Page updated successfully');
		}catch(\Exception $e) {
			return redirect()->back()->with('success_message', $e->getMessage());
		}
	}
}

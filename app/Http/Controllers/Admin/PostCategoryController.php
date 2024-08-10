<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPosts;
use DB;

class PostCategoryController extends Controller
{
    public function post_categoty_list() {
		$data = DB::table('category_posts as c1')
					->select('c1.name as parent', 'c2.name as category', 'c2.slug', 'c2.id')
					->rightJoin('category_posts as c2', 'c2.parent_category', '=', 'c1.id')
					->where('c2.status', '<>', 'deleted')
					->get();
		$settings = DB::table('settings')->first();
		return view('admin.post_category.list', compact('data', 'settings'));
	}
	
	public function post_categoty_add() {
		$records = CategoryPosts::where('status', 'active')->get();
		$settings = DB::table('settings')->first();
		return view('admin.post_category.add', compact('records', 'settings'));
	}
	
	public function post_categoty_insert(Request $request) {
		$data = array();
		$str = $request->name;
		$delimiter = '-';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
		
		$data = [
			'name' => $request->name,
			'slug' => $slug,
			'parent_category' => $request->parent_id,
			'category_type' => $request->category_type,
			'description' => $request->editor_content,
			'status' => 'active',
			'updated_by' => auth()->user()->id,
			'created_at' => DB::raw('NOW()'),
			'updated_at' => DB::raw('NOW()')
		];
		
		$check_category = DB::table('category_posts')->where('name', $request->name)->where('status', '<>', 'deleted')->first();
		if(empty($check_category->id)) {
			if($request->hasFile('file'))
			{
				$allowedfileExtension=['jpg', 'jpeg', 'png'];
				$extension = $request->file->extension();
				$check=in_array($extension,$allowedfileExtension);
				if($check) {
					if($request->file->getSize() <= 1048576) {
						$imageName = 'category_'.time().'.'.$request->file->extension();
						$request->file->move(public_path('uploads/category'), $imageName);
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
				DB::table('category_posts')->insert($data);
				return redirect()->back()->with('success_message', 'Post Category added successfully');
			}catch(\Exception $e) {
				return redirect()->back()->with('success_message', $e->getMessage());
			}
		}else {
			return redirect()->back()->with('success_message', 'Category already exists');
		}
	}
	
	public function post_categoty_edit($id) {
		$category = DB::table('category_posts')
									->where('id', $id)
									//->where('status', '<>', 'deleted')
									->first();
		if(!empty($category)) {							
			$records = CategoryPosts::where('status', '<>', 'deleted')->where('id', '<>', $id)->get();
			$settings = DB::table('settings')->first();
		
			return view('admin.post_category.edit', compact('category','records', 'settings'));
		}else {
			return redirect()->back()->with('success_message', 'Category ID does not exists');
		}
	}
	
	public function post_categoty_update(Request $request, $id) {
		$data = array();
		
		$str = $request->name;
		$delimiter = '-';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
		
		$data = [
					'name' => $request->name,
					'slug' => $slug,
					'parent_category' => $request->parent_id,
					'description' => $request->editor_content,
					'status' => $request->status,
					'updated_by' => auth()->user()->id,
					'updated_at' => DB::raw('NOW()')
				];
		
		if($request->add_remove_category_image == 1) {
			$data = [
				'image' => null
			]+$data;
		}
		
		if($request->hasFile('file'))
		{
			$allowedfileExtension=['jpg', 'jpeg', 'png'];
			$extension = $request->file->extension();
			$check=in_array($extension,$allowedfileExtension);
			if($check) {
				if($request->file->getSize() <= 1048576) {
					$imageName = 'category_'.time().'.'.$request->file->extension();
					$request->file->move(public_path('uploads/category'), $imageName);
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
			$category = DB::table('category_posts')->where('id', $id)->first();
			if(!empty($category->id)) {
				$filePath = public_path('uploads/category').'/'.$category->image;
				//unlink($filePath);
				DB::table('category_posts')
						->where('id', $id)
						->update($data);
						
				return redirect()->back()->with('success_message', 'Category updated successfully');
			}else {
				return redirect()->back()->with('success_message', 'Invalid Category ID');
			}
		}catch(\Exception $e) {
			return redirect()->back()->with('success_message', $e->getMessage());
		}
	}
}

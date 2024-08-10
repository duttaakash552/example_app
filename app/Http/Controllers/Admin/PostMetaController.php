<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PostMetaController extends Controller
{
    public function update(Request $request) {
		$data = array();
		$is_added = DB::table('post_metas')
					->where('meta_key', $request->meta_key)
					->where('post_id', $request->post_id)
					->where('post_type', $request->post_type)
					->first();
		if(isset($is_added)) {
			$data = array("status" => false, "message" => "Custom field already added");
			return json_encode($data);
		}else {
			$create = DB::table('post_metas')->insert($request->all());
			if($create) {
				$data = array("status" => false, "message" => "Custom field added successfully");
				return json_encode($data);
			}else {
				return false;
			}
		}
	}
	
	public function post_update(Request $request) {
		$data = $request->only('meta_key', 'meta_value');
		$is_added = DB::table('post_metas')
					->where('meta_key', $request->meta_key)
					->where('post_id', $request->post_id)
					->where('post_type', $request->post_type)
					->where('id', '<>', $request->id)
					->first();
		
		if(isset($is_added)) {
			return redirect()->back()->with('success_field_message', 'Custom field already added');
		} else{
			try {
				$create = DB::table('post_metas')->where('id', $request->id)->update($data);
				return redirect()->back()->with('success_field_message', 'Custom field updated successfully');
			}catch(\Exception $e) {
				return redirect()->back()->with('success_field_message', $e->getMessage());
			}
		}
	}
	
	public function remove_meta(Request $request) {
		$id = $request->meta_id;
		try {
			DB::table('post_metas')->where('id', $id)->delete();
			return redirect()->back()->with('success_field_message', 'Custom field deleted successfully');
		}catch(\Exception $e) {
			return redirect()->back()->with('success_field_message', $e->getMessage());
		}
	}
}

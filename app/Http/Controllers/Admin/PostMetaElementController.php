<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PostMetaElementController extends Controller
{
    public function metaupdate(Request $request) {
		$data = $request->only('post_type','post_id','title','description', 'keywords', 'robots', 'revisit_after', 'og_locale', 'og_type', 'og_image', 'og_title', 'og_url', 'og_description', 'og_site_name', 'author', 'canonical', 'geo_region', 'geo_placename', 'geo_position', 'ICBM');
		try {
			$categories_elements = DB::table('post_meta_elements')->where('post_id', $request->post_id)->where('post_type', $request->post_type)->first();
			if(!empty($categories_elements->id)) {
				DB::table('post_meta_elements')->where('post_id', $request->post_id)->where('post_type', $request->post_type)->update($data);
			}else {
				DB::table('post_meta_elements')->insert($data);
			}
			return redirect()->back()->with('success_meta_message', 'Meta Elements added successfully');
		}catch(\Exception $e) {
			return redirect()->back()->with('success_message', $e->getMessage());
		}
	}
}

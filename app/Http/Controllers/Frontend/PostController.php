<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function index($param1, $param2 = null, $param3 = null)
    {	
		$replacements = array();
		// Get the current URL
		$url = $_SERVER['REQUEST_URI'];
		
		// Break the URL into parts
		$urlParts = explode('/', trim($url, '/'));
		/***********Top Menu*****************/
		$menu = array();
		$header = DB::table('pages as p1')
					->select('p1.title as parent_title', 'p2.title as sub_pages', 'p1.slug as parent_slug', 'p2.slug as sub_slug', 'p2.disable_link')
					->rightjoin('pages as p2', 'p2.parent_id', '=', 'p1.id')
					->where('p2.status', '<>', 'deleted')
					->where('p2.ckeck_menu', '1')
					->get();
					
		//echo "<pre>"; print_r($header); exit();
		
		foreach($header as $h) {
			if(!empty($h->parent_title)) {
				$menu[$h->parent_title][] = array(
					'sub_page_title' => $h->sub_pages,
					'sub_page_slug' => $h->sub_slug,
					'disable_link' => $h->disable_link
				);
			}else {
				$menu[$h->sub_pages] = array(
					'parent_page_slug' => $h->sub_slug,
					'disable_link' => $h->disable_link
				);
			}
		}
		$array_key = array_keys($menu);
		// Filtering arrays without 'parent_page_slug'
		$mega_menu = array_filter($menu, function($item) {
			return !isset($item['parent_page_slug']);
		});
		/****************Top Menu End*******************/
		$page = DB::table('pages')
						->select('pages.*','templates.name as template_name')
						->join('templates', 'templates.id', '=', 'pages.template')
						->where('slug', $param1)
						->where('status', 'active')
						->first();
						
		$settings = DB::table('settings')->first();
		$shortcodes = DB::table('widgets')->select('title', 'content')->get();
		if(isset($page)) {
			$metadata = DB::table('post_meta_elements')->where('post_id', $page->id)->where('post_type', 'page')->first();
		}else {
			$metadata = DB::table('post_meta_elements')->where('post_id', '31')->where('post_type', 'page')->first();
		}
		
		if(!empty($page)) {
			//Add shortcode and content into array
			foreach($shortcodes as $shortcode) {
				$replacements[$shortcode->title] = $shortcode->content;
			}
			
			// Regex pattern to match anything within []
			$pattern = '/\[(.*?)\]/';

			// Replace each shortcode with its corresponding string
			$processed_input = preg_replace_callback($pattern, function($matches) use ($replacements) {
				$shortcode = $matches[1];
				if (array_key_exists($shortcode, $replacements)) {
					return $replacements[$shortcode];
				}
				// If no replacement found, return the original shortcode
				return $matches[0];
			}, $page->description);
			
			// Custom fields
			$banner_header = DB::table('post_metas')
									->select('meta_value')
									->where('post_id', $page->id)
									->where('post_type', 'page')
									->where('meta_key', 'banner_header')
									->first();
			
			if($page->template_name == 'Default Template') {
				return view('frontend.page.index', compact('page', 'settings', 'processed_input', 'menu', 'array_key', 'banner_header', 'metadata', 'mega_menu', 'urlParts'));
			}
			if($page->template_name == 'Left Sidebar Page') {
				return view('frontend.page.left_sidebar_template', compact('page', 'settings', 'processed_input', 'menu', 'array_key', 'banner_header', 'metadata', 'mega_menu', 'urlParts'));
			}
		}else {
			$last_param = (!empty($param3)) ? $param3 : ((!empty($param2)) ? $param2 : $param1);
			$post = DB::table('posts')->where('slug', $last_param)->where('status', 'active')->first();
			
			if(!empty($post)) {
				//Add shortcode and content into array
				foreach($shortcodes as $shortcode) {
					$replacements[$shortcode->title] = $shortcode->content;
				}
				
				// Regex pattern to match anything within []
				$pattern = '/\[(.*?)\]/';

				// Replace each shortcode with its corresponding string
				$processed_input = preg_replace_callback($pattern, function($matches) use ($replacements) {
					$shortcode = $matches[1];
					if (array_key_exists($shortcode, $replacements)) {
						return $replacements[$shortcode];
					}
					// If no replacement found, return the original shortcode
					return $matches[0];
				}, $post->description);
				$metadata = DB::table('post_meta_elements')->where('post_id', $post->id)->where('post_type', 'post')->first();
				
				if(!empty($post)) {
					$categories_arr = explode(',', $post->category);
					if($last_param == $param3) {
						$slug1 = DB::table('category_posts')->where('slug', $param1)->value('id');
						$slug2 = DB::table('category_posts')->where('slug', $param2)->first();
						if(isset($slug2)) {
							if(($slug2->parent_category == $slug1) && in_array($slug1, $categories_arr)) {
								return view('frontend.post.blog.details', compact('post', 'settings', 'processed_input', 'menu', 'array_key', 'metadata', 'mega_menu', 'urlParts'));
							}else {
								return view('frontend.page.404', compact('settings', 'menu', 'array_key', 'metadata', 'mega_menu', 'urlParts'));
							}
						}else {
							return view('frontend.page.404', compact('settings', 'menu', 'array_key', 'metadata' ,'mega_menu', 'urlParts'));
						}
					}else if($last_param == $param2) {
						$slug1 = DB::table('category_posts')->where('slug', $param1)->value('id');
						if(in_array($slug1, $categories_arr)) {
							return view('frontend.post.blog.details', compact('post', 'settings', 'processed_input', 'menu', 'array_key', 'metadata', 'mega_menu', 'urlParts'));
						}else {
							return view('frontend.page.404', compact('settings', 'menu', 'array_key', 'mega_menu', 'metadata', 'urlParts'));
						}
					}else {
						return view('frontend.post.blog.details', compact('post', 'settings', 'processed_input', 'menu', 'array_key', 'metadata', 'mega_menu', 'urlParts'));
					}
				}else {
					return view('frontend.page.404', compact('settings', 'menu', 'array_key', 'metadata', 'mega_menu', 'urlParts'));
				}
			}else {
				return view('frontend.page.404', compact('settings', 'menu', 'array_key', 'metadata', 'mega_menu', 'urlParts'));
			}
		}
    }
}

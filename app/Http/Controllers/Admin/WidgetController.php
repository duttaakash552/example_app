<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Widgets;
use DB;

class WidgetController extends Controller
{
    public function index() {
		$widgets = Widgets::get();
		$settings = DB::table('settings')->first();
		return view('admin.widget.widget', compact('widgets', 'settings'));
	}
	
	public function insert(Request $request) {
		try {
			if(isset($request->id)) {
				$input = $request->only('title', 'description', 'content');
				Widgets::where('id', $request->id)->update($input);
				return redirect()->back()->with('success_message', 'Widget updated successfully');
			}else {
				Widgets::create($request->all());
				return redirect()->back()->with('success_message', 'Widget added successfully');
			}
		}catch(\Exception $e) {
			return redirect()->back()->with('success_message', $e->getMessage());
		}
	}
	
	public function remove(Request $request) {
		try {
			Widgets::where('id', $request->id)->delete();
			return redirect()->back()->with('success_message', 'Widget successfully deleted');
		}catch(\Exception $e) {
			return redirect()->back()->with('success_message', $e->getMessage());
		}
	}
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TemplateController extends Controller
{
    public function index() {
		return view('admin.template.add');
	}
	
	public function insert(Request $request) {
		$data = array();
		$data = [
			'name' => $request->name,
			'template_header' => $request->template_header,
			'template_footer' => $request->template_footer,
			'created_at' => DB::raw('NOW()'),
			'updated_at' => DB::raw('NOW()')
		];
		try {
			DB::table('templates')->insert($data);
			return redirect()->back()->with('success_message', 'Template added successfully');
		}catch(\Exception $e) {
			return redirect()->back()->with('success_message', $e->getMessage());
		}
	}
	
	public function list() {
		$templates = DB::table('templates')->orderBy('id', 'desc')->get();
		return view('admin.template.list', compact('templates'));
	}
	
	public function edit($id) {
		$template = DB::table('templates')->where('id', $id)->first();
		return view('admin.template.edit', compact('template'));
	}
	
	public function update(Request $request, $id) {
		$data = [
			'name' => $request->name,
			'template_header' => $request->template_header,
			'template_footer' => $request->template_footer,
			'updated_at' => DB::raw('NOW()')
		];
		
		try {
			DB::table('templates')->where('id', $id)->update($data);
			return redirect()->back()->with('success_message', 'Template updated successfully');
		}catch(\Exception $e) {
			return redirect()->back()->with('success_message', $e->getMessage());
		}
	}
}

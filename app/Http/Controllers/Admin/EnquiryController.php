<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class EnquiryController extends Controller
{
    public function list() {
		$enquiry_lists = DB::table('contact_enquiries')->get();
		$settings = DB::table('settings')->first();
		return view('admin.enquiry.list', compact('enquiry_lists', 'settings'));
	}
	
	public function details($id) {
		$enquiry_details = DB::table('contact_enquiries')->where('id', $id)->first();
		$settings = DB::table('settings')->first();
		return view('admin.enquiry.details', compact('enquiry_details', 'settings'));
	}
}

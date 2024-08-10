<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index() {
		$settings = DB::table('settings')->first();
		return view('admin.home', compact('settings'));
	}
}

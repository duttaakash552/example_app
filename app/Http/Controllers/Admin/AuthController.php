<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class AuthController extends Controller
{
    public function index() {
		$settings = DB::table('settings')->first();
		return view('admin.login', compact('settings'));
	}
	
	public function auth(Request $request) {
		if($request->rememberme=='1')
		{
			$hour = time() + 3600 * 24 * 30;
			setcookie('email', $request->email, $hour);
			setcookie('password', $request->password, $hour);
			setcookie('remember', 1, $hour);
		}else {
			setcookie('email', '', -1);
			setcookie('password', '', -1);
			setcookie('remember', '', -1);
		}
		
		$data = array(
			'email' => $request->email,
			'password' => $request->password
		);
		
		if(Auth::attempt($data)) {
			return redirect('/admin');
		}else {
			return redirect()->back()->with('success_message', 'Invalid login credential');
		}
	}
	
	public function logout() {
		Auth::logout();
		return redirect('/admin/login');
	}
}

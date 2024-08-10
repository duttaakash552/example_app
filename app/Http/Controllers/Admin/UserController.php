<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;
use Auth;

class UserController extends Controller
{
    public function edit_profile() {
		$roles = DB::table('roles')->get();
		$user = DB::table('users')->where('id', auth()->user()->id)->first();
		return view('admin.profile', compact('roles', 'user'));
	}
	
	public function update_profile(Request $request) {
		$imageName = '';
		if(!empty($request->dob)) {
			$dob=date("Y-m-d",strtotime($request->dob));
		}else {
			$dob=null;
		}
		
		if(!empty($request->user_role)) {
			$user_role = implode(",", $request->user_role);
		}else {
			$user_role = '';
		}
		
		$data = array(
					'name' => $request->name,
					'email' => $request->email,
					'dob' => $dob,
					'company_name' => $request->company_name,
					'company_regno' => $request->company_regno,
					'user_role' => $user_role,
					'updated_by' => auth()->user()->id,
					'updated_at' => DB::raw('NOW()')
				);
		
		try {
			$check_email = DB::table('users')
								->where('email', $request->email)
								->where('id', '<>', auth()->user()->id)
								->value('id');
			if(empty($check_email)) {
				if($request->hasFile('file'))
				{
					$allowedfileExtension=['jpg', 'jpeg'];
					$extension = $request->file->extension();
					$check=in_array($extension,$allowedfileExtension);
					if($check) {
						if($request->file->getSize() <= 1048576) {
							$imageName = time().'.'.$request->file->extension();
							$request->file->move(public_path('uploads'), $imageName);
							$filePath = public_path('uploads').'/'.auth()->user()->image;
							//unlink($filePath);
							$data = [
								'image' => $imageName
							]+$data;
						}else {
							return redirect()->back()->with('success_message', 'File size can not be more than 1 MB');
						}
					}else {
						return redirect()->back()->with('success_message', 'Only jpg & jpeg format is allowed');
					}
				}
				
				DB::table('users')
					->where('id', auth()->user()->id)
					->update($data);
				return redirect()->back()->with('success_message', 'Profile updated successfully');
			}else {
				return redirect()->back()->with('success_message', 'Email already exist');
			}
		}catch(\Exception $e) {
			return redirect()->back()->with('success_message', $e->getMessage());
		}
	}
	
	public function edit_password() {
		return view('admin.change_password');
	}
	
	public function update_password(Request $request) {
		// Verify the current password
		$user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('success_message', 'The current password is incorrect.')->withInput();
        }
		
		if($request->password != $request->confirm_password) {
			return redirect()->back()->with('success_message', 'Password and Confirm Password must be same')->withInput();
		}
		
		$password = trim($request->password);
		if(strlen($password) < 6) {
			return redirect()->back()->with('success_message', 'Password must be atleast 6 characters')->withInput();
		}
		
		$user->password = bcrypt($request->password);
        $user->save();
		
		return redirect()->back()->with('success_message', 'Password successfully updated');
	}
}

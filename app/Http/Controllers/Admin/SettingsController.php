<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use DB;
use URL;

class SettingsController extends Controller
{
    public function edit_settings() {
		$user = DB::table('settings')->where('user_id', auth()->user()->id)->first();
		return view('admin.settings', compact('user'));
	}
	
	public function update_settings(Request $request) {
		$data = array();
		
		$data = [
					'user_id' => auth()->user()->id,
					'title' => $request->title,
					'tag_line' => $request->tag_line,
					'phone' => $request->phone,
					'email' => $request->email,
					'cc_email' => $request->cc_email,
					'bcc_email' => $request->bcc_email,
					'updated_by' => auth()->user()->id,
					'updated_at' => DB::raw('NOW()')
				];
		
		if($request->add_remove_logo == 1) {
			$data = [
				'logo_image' => null
			]+$data;
		}
		
		if($request->add_remove_icon == 1) {
			$data = [
				'fav_icon' => null
			]+$data;
		}
		
		if($request->hasFile('logo'))
		{
			$allowedfileExtension=['jpg', 'jpeg', 'png'];
			$extension = $request->logo->extension();
			$check=in_array($extension,$allowedfileExtension);
			if($check) {
				if($request->logo->getSize() <= 1048576) {
					$imageName = 'logo_'.time().'.'.$request->logo->extension();
					$request->logo->move(public_path('uploads/settings'), $imageName);
					$data = [
						'logo_image' => $imageName
						]+$data;
				}else {
					return redirect()->back()->with('success_message', 'File size can not be more than 1 MB');
				}
			}else {
				return redirect()->back()->with('success_message', 'Only jpg, jpeg & png formats are allowed');
			}
		}
		
		if($request->hasFile('fav_icon'))
		{
			$allowedfileExtension=['jpg', 'jpeg', 'png'];
			$extension = $request->fav_icon->extension();
			$check=in_array($extension,$allowedfileExtension);
			if($check) {
				if($request->fav_icon->getSize() <= 1048576) {
					$imageName = 'icon_'.time().'.'.$request->fav_icon->extension();
					$request->fav_icon->move(public_path('uploads/settings'), $imageName);
					$data = [
						'fav_icon' => $imageName
						]+$data;
				}else {
					return redirect()->back()->with('success_message', 'File size can not be more than 1 MB');
				}
			}else {
				return redirect()->back()->with('success_message', 'Only jpg, jpeg & png formats are allowed');
			}
		}
		
		try {
			$user_settings = DB::table('settings')->where('user_id', auth()->user()->id)->first();
			if(!empty($user_settings->id)) {
				
				$filePath = public_path('uploads/settings').'/'.$user_settings->logo_image;
				
				
				$filePath2 = public_path('uploads/settings').'/'.$user_settings->fav_icon;
				
				/*if($request->add_remove_logo == 1) {
					unlink($filePath);
				}
				if($request->add_remove_icon == 1) {
					unlink($filePath2);
				}*/
				DB::table('settings')
						->where('user_id', auth()->user()->id)
						->update($data);
						
				return redirect()->back()->with('success_message', 'Settings updated successfully');
			}else {
				$data = [
					'created_at' => DB::raw('NOW()')
				]+$data;
				DB::table('settings')->insert($data);
				return redirect()->back()->with('success_message', 'Settings added successfully');
			}
		}catch(\Exception $e) {
			return redirect()->back()->with('success_message', $e->getMessage());
		}
	}
}

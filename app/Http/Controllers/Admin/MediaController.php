<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medias;
use DB;

class MediaController extends Controller
{
    public function index() {
		$settings = DB::table('settings')->first();
		return view('admin.media.add', compact('settings'));
	}
	
	public function insert(Request $request) {
		if($request->hasFile('file'))
		{
			$allowedfileExtension=['jpeg','jpg','png','docx'];
			$files = $request->file('file');
			if(count($files) > 5) {
				return redirect()->back()->with('success_message', 'Maximum 5 images can be uploaded');
			}
			foreach($files as $file){
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				$check=in_array($extension,$allowedfileExtension);
			}
			if($check)
			{
				$count = 1;
				foreach ($request->file as $photo) {
					if($photo->getSize() <= 1048576) {
						$imageName = 'media_'.$count.time().'.'.$photo->extension();
						$photo->move(public_path('uploads/media'), $imageName);
						Medias::create([
							'image' => $imageName,
							'updated_by' => auth()->user()->id,
							'status' => 'active'
						]);
						$count++;
					}else {
						return redirect()->back()->with('success_message', 'File size can not be more than 1 MB');
					}
				}
				return redirect()->back()->with('success_message', 'Upload Successfully');
			}
			else
			{
				echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload jpeg , jpg , png and docx</div>';
			}
		}else {
			return redirect()->back()->with('success_message', 'Invalid file');
		}
	}
	
	public function list() {
		$medias = DB::table('medias')
						->select('medias.id', 'medias.image', 'users.name')
						->join('users', 'users.id', '=', 'medias.updated_by')
						->where('medias.status', 'active')
						->get();
		$settings = DB::table('settings')->first();
		
		return view('admin.media.list', compact('medias', 'settings'));
	}
	
	public function remove(Request $request) {
		$id = $request->id;
		/*$data = array(
			'status' => 'deleted'
		);*/
		
		try {
			$media = DB::table('medias')->where('id', $id)->first();
			$filePath = public_path('uploads/media').'/'.$media->image;
			unlink($filePath);
			DB::table('medias')
					->where('id', $id)
					->delete();
					
			return redirect()->back()->with('success_message', 'Media deleted successfully');
		}catch(\Exception $e) {
			return redirect()->back()->with('success_message', $e->getMessage());
		}
	}
}

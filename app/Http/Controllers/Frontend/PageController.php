<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\CustomHelper;
use App\Models\ContactEnquiry;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Validator;

class PageController extends Controller
{
	public function index() {
		$settings = DB::table('settings')->first();
		/***********Top Menu*****************/
		$menu = array();
		$header = DB::table('pages as p1')
					->select('p1.title as parent_title', 'p2.title as sub_pages', 'p1.slug as parent_slug', 'p2.slug as sub_slug', 'p2.id', 'p2.disable_link')
					->rightjoin('pages as p2', 'p2.parent_id', '=', 'p1.id')
					->where('p2.status', '<>', 'deleted')
					->where('p2.ckeck_menu', '1')
					->get();
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
		
		$metadata = DB::table('post_meta_elements')->where('post_id', '24')->where('post_type', 'page')->first();
		
		return view('frontend.page.home', compact('settings', 'menu', 'array_key', 'metadata', 'mega_menu'));
	}
	
	public function checkNumberInCharacter($string){
		if (preg_match('/[0-9]/', $string)){$error = 1;return $error;}
	}
	
	public function checkWordsCharacter($string){
		if(preg_match_all("/\b[a-zA-Z0-9]{16,}\b/", $string)){
			$error = 1;return $error;
		}
	}
	
	public function checkMessageWordCountMoreThan2Words($string){
		if(str_word_count($string) <= 1){
		$error = 1;return $error; }
	}
	
	public function checkSymbolWithinParagraph($string){
		$illegal = "~`\/@#$%^*";
		return (false === strpbrk($string, $illegal)) ? '' : "1";
	}
	
	public function checkHtmltagsAndLinksNew($string){
		preg_match_all('/\b(?:(?:https?|ftp|file):\/\/|www\.|ftp\.)[-A-Z0-9+&@#\/%=~_|$?!:,.]*[A-Z0-9+&@#\/%=~_|$]/i', $string, $result, PREG_PATTERN_ORDER);
		if(!empty($result[0])){$error = 1;return $error;}
		if(strlen($string) != strlen(strip_tags($string))){$error = 1;return $error;}
	}
	
	public function checkExtraDotsInEmailField($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		  $getData =  explode("@", $email);
		  $getDotData =  explode(".", $getData[0]);
		  $noOfDots = count($getDotData);
			if($noOfDots > 2){$error = 1; return $error;}
		}
	}
  
	public function validatePhoneNumber($phoneNumber) {
		// Regular expression pattern
		$pattern = '/^(07|02|01|\+44)\d{8,11}$/'; //This regex is for uk numbers
		//$pattern = '/^(?:\+\d{2}\s?)?\d{9,13}$/'; //This regex is for general numbers

		// Validate the phone number against the pattern
		if (preg_match($pattern, $phoneNumber)) {
			return true;
		} else {
			return false;
		}
	}

	public function isValidDomainOnEmail($email){
    
		$domain = substr($email, strpos($email, '@') + 1);

		$rejected_domains = config('cms.rejected_domains');
 
		$is_valid_email = true;

		if(in_array($domain,$rejected_domains)){
			$is_valid_email = false;
		}

		return $is_valid_email;

	}
	
	public function contact() {
		$settings = DB::table('settings')->first();
		/***********Top Menu*****************/
		$menu = array();
		$header = DB::table('pages as p1')
					->select('p1.title as parent_title', 'p2.title as sub_pages', 'p1.slug as parent_slug', 'p2.slug as sub_slug', 'p2.disable_link')
					->rightjoin('pages as p2', 'p2.parent_id', '=', 'p1.id')
					->where('p2.status', '<>', 'deleted')
					->where('p2.ckeck_menu', '1')
					->get();
					
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
		
		$metadata = DB::table('post_meta_elements')->where('post_id', '25')->where('post_type', 'page')->first();
		
		return view('frontend.page.contact_us', compact('settings','menu','array_key', 'metadata', 'mega_menu'));
	}
	
	public function contact_submit(Request $request) {
		if ($request->ajax()) {
			
			/*$validator = Validator::make($request->all(), [
				'g-recaptcha-response' => 'required',
			]);
			
			if ($validator->fails()) {
				return response()->json(['status' => false, 'danger' => 'The g-recaptcha-response field is required.']);
			}*/
			
			$full_url = request()->headers->get('referer');
			$url = parse_url($full_url, PHP_URL_SCHEME).'://'.parse_url($full_url, PHP_URL_HOST);
			$base_url = trim($url, '/');
			$app_url = config('app.url');
			if($base_url != $app_url){
				Session::flash('success', 'Your information has been submitted successfully'); 
				return response()->json(['status' => true, 'success' => 'Email sent successfully']);
			}
			
			$input = $request->only('name','email','phone','message', 'enquiry_type', 'page_link', 'page_title');
			/*$to = getOption('site_emails') ? getOption('site_emails') : '';
			$cc  = getOption('site_cc_emails') ? getOption('site_cc_emails') : '';
			$bcc = getOption('site_bcc_emails') ? getOption('site_bcc_emails') : '';*/
			$subject = "New contact request from ".$input['name'];
			//$email_arr = array('to' => $to, 'cc' => $cc, 'bcc' => $bcc, 'subject' => $subject);
			
			$email_exist_in_form = 0; $name_exist_in_form = 0; $hour = 24;
			if (ContactEnquiry::where([['email', $request->email],['enquiry_type', $request->enquiry_type]])->where('created_at', '>', Carbon::now()->subHours($hour)->toDateTimeString())->count()) {
				$email_exist_in_form = 1;
			}    
			if (ContactEnquiry::where([['name', $input['name']],['enquiry_type', $request->enquiry_type]])->where('created_at', '>', Carbon::now()->subHours($hour)->toDateTimeString())->count()) {
				$name_exist_in_form = 1;
			}
			
			$messgeField = NULL;
			$settings = DB::table('settings')->first();
			$style = DB::table('post_metas')->where('post_id', 34)->where('post_type', 'page')->where('meta_key', 'mail_style')->first();
			
			if(
			  $this->validatePhoneNumber($input['phone']) == false ||
			  $this->isValidDomainOnEmail($input['email']) == false ||
			  $email_exist_in_form == 1 ||  
			  $name_exist_in_form == 1  ||
			  $this->checkWordsCharacter($request->name) == 1 ||
			  $this->checkExtraDotsInEmailField($request->email) == 1 ||
			  $this->checkWordsCharacter($messgeField) == 1 ||
			  $this->checkSymbolWithinParagraph($messgeField) == 1 ||
			  $this->checkHtmltagsAndLinksNew($messgeField)==1) {
				try{

					/*$result = Mail::send('emails.contact-email', ['request' => $input], function ($message) use ($email_arr) {
					  $mailto:message->to('bablu.developer16@gmail.com')->subject('optimalvision | Invalid Input OR Multiple Times Same Data Entered!!!');
					});*/

					Mail::to('duttaakash552@gmail.com')
							->cc('cc@example.com')->bcc('bcc@example.com')->send(new TestMail($input, $subject, $settings, $style));
					
					Session::flash('success', 'Email sent successfully');
					return response()->json(['status' => true, 'success' => 'Email sent successfully']);
				}catch(\Exception $e){
					Session::flash('danger', $e->getMessage());
					return response()->json(['status' => false, 'danger' => $e->getMessage()]);
				}
			}else {
				try{
					/*$result = Mail::send('emails.contact-email', ['request' => $input], function ($message) use ($email_arr) {
						if (count($email_arr['cc']) > 0) {
							$message->cc($email_arr['cc']);
						}
						if (count($email_arr['bcc']) > 0) {
							$message->bcc($email_arr['bcc']);
						}
						$message->to($email_arr['to'])->subject($email_arr['subject']);
					});*/
					Mail::to('duttaakash552@gmail.com')
							->cc('cc@example.com')->bcc('bcc@example.com')->send(new TestMail($input, $subject, $settings, $style));
					
					ContactEnquiry::create($input);
					Session::flash('success', 'Email sent successfully');
					return response()->json(['status' => true, 'success' => 'Email sent successfully']);
				}catch(\Exception $e){
					Session::flash('danger', $e->getMessage());
					return response()->json(['status' => false, 'danger' => $e->getMessage()]);
				}
			}
		}else {
			return request()->back()->with('success_message', 'Invalid request');
		}
	}
	
	public function thankyou() {
		$settings = DB::table('settings')->first();
		/***********Top Menu*****************/
		$menu = array();
		$header = DB::table('pages as p1')
					->select('p1.title as parent_title', 'p2.title as sub_pages', 'p1.slug as parent_slug', 'p2.slug as sub_slug', 'p2.disable_link')
					->rightjoin('pages as p2', 'p2.parent_id', '=', 'p1.id')
					->where('p2.status', '<>', 'deleted')
					->where('p2.ckeck_menu', '1')
					->get();
		
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
		
		$metadata = DB::table('post_meta_elements')->where('post_id', '26')->where('post_type', 'page')->first();
		
		return view('frontend.page.thank_you',compact('settings','menu','array_key', 'metadata', 'mega_menu'));
	}
}

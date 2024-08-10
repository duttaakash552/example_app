<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\WidgetController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PostMetaElementController;
use App\Http\Controllers\Admin\PostMetaController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Frontend\PostController as FrontendPostController;
use App\Http\Controllers\Frontend\PageController as FrontenfPageController;

Route::group(['prefix'=>'admin'], function(){
	Route::group(['middleware' => 'LoginMiddleware'], function() {
		Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
		Route::post('/auth', [AuthController::class, 'auth'])->name('admin.authentication');
	});
	
	Route::group(['middleware' => 'AuthMiddleWare'], function() {
		Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');
		Route::get('/edit-profile', [UserController::class, 'edit_profile'])->name('admin.edit.profile');
		Route::post('/update-profile', [UserController::class, 'update_profile'])->name('admin.update.profile');
		Route::get('/edit-settings', [SettingsController::class, 'edit_settings'])->name('admin.edit.settings');
		Route::post('/update-settings', [SettingsController::class, 'update_settings'])->name('admin.update.settings');
		Route::get('/edit-password', [UserController::class, 'edit_password'])->name('admin.edit.password');
		Route::post('/update-password', [UserController::class, 'update_password'])->name('admin.update.password');
		Route::get('/post-categoty-list', [PostCategoryController::class, 'post_categoty_list'])->name('admin.post.categoty.list');
		Route::get('/post-categoty-add', [PostCategoryController::class, 'post_categoty_add'])->name('admin.post.categoty.add');
		Route::post('/post-categoty-insert', [PostCategoryController::class, 'post_categoty_insert'])->name('admin.post.categoty.insert');
		Route::get('/post-categoty-edit/{id}', [PostCategoryController::class, 'post_categoty_edit'])->name('admin.post.categoty.edit');
		Route::post('/post-categoty-update/{id}', [PostCategoryController::class, 'post_categoty_update'])->name('admin.post.categoty.update');
		Route::get('/post/create', [PostController::class, 'index'])->name('admin.post.add');
		Route::post('/post/insert', [PostController::class, 'insert'])->name('admin.post.insert');
		Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
		Route::post('/post/update/{id}', [PostController::class, 'update'])->name('admin.post.update');
		Route::get('/post/list', [PostController::class, 'list'])->name('admin.post.list');
		Route::get('/page/list', [PageController::class, 'list'])->name('admin.page.list');
		Route::get('/page/create', [PageController::class, 'create'])->name('admin.page.create');
		Route::post('/page/insert', [PageController::class, 'insert'])->name('admin.page.insert');
		Route::get('/page/edit/{id}', [PageController::class, 'edit'])->name('admin.page.edit');
		Route::post('/page/update/{id}', [PageController::class, 'update'])->name('admin.page.update');
		Route::get('/area/create', [AreaController::class, 'index'])->name('admin.area.create');
		Route::post('/area/insert', [AreaController::class, 'insert'])->name('admin.area.insert');
		Route::get('/area/list', [AreaController::class, 'list'])->name('admin.area.list');
		Route::get('/area/edit/{id}', [AreaController::class, 'edit'])->name('admin.area.edit');
		Route::post('/area/update/{id}', [AreaController::class, 'update'])->name('admin.area.update');
		Route::get('/media/create', [MediaController::class, 'index'])->name('admin.media.create');
		Route::post('/media/insert', [MediaController::class, 'insert'])->name('admin.media.insert');
		Route::get('/media/list', [MediaController::class, 'list'])->name('admin.media.list');
		Route::post('/media/remove', [MediaController::class, 'remove'])->name('admin.media.remove');
		Route::get('/widgets', [WidgetController::class, 'index'])->name('widget');
		Route::post('/insert-widgets', [WidgetController::class, 'insert'])->name('insert.widget');
		Route::post('/remove-widgets', [WidgetController::class, 'remove'])->name('remove.widget');
		Route::get('/post-meta/update', [PostMetaController::class, 'update'])->name('admin.customfield');
		Route::post('/meta/update', [PostMetaController::class, 'post_update'])->name('admin.post.customfield');
		Route::post('/meta/delete', [PostMetaController::class, 'remove_meta'])->name('admin.remove.customfield');
		Route::post('/post-meta-element/update', [PostMetaElementController::class, 'metaupdate'])->name('admin.post.meta.update');
		Route::get('/enquiry/list', [EnquiryController::class, 'list'])->name('admin.enquiry.list');
		Route::get('/enquiry/details/{id}', [EnquiryController::class, 'details'])->name('admin.enquiry.details');
		Route::get('/logout', [AuthController::class, 'logout'])->name('dashboard.logout');
	});
});

Route::get('/', [FrontenfPageController::class, 'index'])->name('home');
Route::get('/contact-us', [FrontenfPageController::class, 'contact'])->name('contact');
Route::post('/contact-form-submit', [FrontenfPageController::class, 'contact_submit'])->name('contact.form.submit');
Route::get('/thank-you', [FrontenfPageController::class, 'thankyou']);
Route::get('/{slug1?}/{slug2?}/{slug3?}', [FrontendPostController::class, 'index']);

// ajax route
Route::get('/api/frontend/default-template/blog-content', function () {
	$blog_posts = DB::table('category_post_tbls')
					->select('posts.*')
					->join('posts', 'posts.slug', '=', 'category_post_tbls.post_slug')
					->where('category_post_tbls.category_id', 10)
					->orderBy('category_post_tbls.id', 'desc')
					->limit(4)
					->get();
	
    $html = view('frontend.page.blog_list', compact('blog_posts'))->render();
    return response()->json(['html' => $html]);
});


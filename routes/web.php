<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login & Logout Account
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [HomeController::class, 'login_handle'])->name('login.handle');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

// Register Account
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register', [HomeController::class, 'register_handle'])->name('register.handle');

// Email Verification
Route::get('/email/verify', function () {
    return view('auth.notification');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'Email verifikasi telah dikirim!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/verified');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/verified', [HomeController::class, 'verified'])->middleware(['auth', 'checkRole:0,1', 'verified'])->name('verified');

// User
Route::get('/', [HomeController::class, 'home'])->name('home');
// User-Profile
Route::get('/profile/{division:slug}', [HomeController::class, 'profile'])->name('profile');
// Arsip
Route::get('/arsip', [HomeController::class, 'arsip'])->name('arsip');
Route::get('/arsip/list', [HomeController::class, 'arsip_list'])->name('arsip.list');
Route::get('/arsip/archives/list/{months}/{month}/{year}', [HomeController::class, 'arsip_archive_list'])->name('arsip.archive.list');
Route::get('/arsip/detail/{content:slug}', [HomeController::class, 'arsip_detail'])->name('arsip.detail');
// User-Aspiration
Route::get('/aspiration', [HomeController::class, 'aspiration'])->name('aspiration');
Route::post('/aspiration', [HomeController::class, 'aspiration_store'])->name('aspiration.store');
// News
Route::get('/news/list', [HomeController::class, 'news_list'])->name('news.list');
Route::get('/news/archives/list/{months}/{month}/{year}', [HomeController::class, 'news_archive_list'])->name('news.archive.list');
Route::get('/news/search', [HomeController::class, 'news_search'])->name('news.search');
Route::get('/news/detail/{content:slug}', [HomeController::class, 'news_detail'])->name('news.detail');

// User & Admin
Route::middleware(['auth', 'checkRole:0,1', 'verified'])->group(function () {
    // Home
    Route::get('/admin', [AdminController::class, 'home'])->name('admin.home');
    // Pengaduan
    Route::get('/admin/pengaduan', [AdminController::class, 'pengaduan_index'])->name('admin.pengaduan.index');
    Route::get('/admin/pengaduan/create', [AdminController::class, 'pengaduan_create'])->name('admin.pengaduan.create');
    Route::post('/admin/pengaduan', [AdminController::class, 'pengaduan_store'])->name('admin.pengaduan.store');
    Route::get('/admin/pengaduan/{pengaduan}', [AdminController::class, 'pengaduan_show'])->name('admin.pengaduan.show');
    Route::get('/admin/pengaduan/{pengaduan}/edit', [AdminController::class, 'pengaduan_edit'])->name('admin.pengaduan.edit');
    Route::patch('/admin/pengaduan/{pengaduan}', [AdminController::class, 'pengaduan_update'])->name('admin.pengaduan.update');
    Route::delete('/admin/pengaduan/{pengaduan}', [AdminController::class, 'pengaduan_destroy'])->name('admin.pengaduan.destroy');
});
// Admin Only
Route::middleware(['auth', 'checkRole:1', 'verified'])->group(function () {
    // Profile
    Route::get('/admin/profile', [AdminController::class, 'profile_index'])->name('admin.profile');
    Route::get('/admin/profile/create', [AdminController::class, 'profile_create'])->name('admin.profile.create');
    Route::post('/admin/profile', [AdminController::class, 'profile_store'])->name('admin.profile.store');
    Route::get('/admin/profile/{profile}', [AdminController::class, 'profile_show'])->name('admin.profile.show');
    Route::get('/admin/profile/{profile}/edit', [AdminController::class, 'profile_edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile/{profile}', [AdminController::class, 'profile_update'])->name('admin.profile.update');
    Route::delete('/admin/profile/{profile}', [AdminController::class, 'profile_destroy'])->name('admin.profile.destroy');
    // Profile Division
    Route::get('/Filter/{division_name}', [AdminController::class, 'Filter']);

    Route::post('/admin/division', [AdminController::class, 'division_store'])->name('admin.division.store');
    Route::delete('/admin/division/{division}', [AdminController::class, 'division_destroy'])->name('admin.division.destroy');
    Route::post('/admin/sub-division', [AdminController::class, 'sub_division_store'])->name('admin.sub.division.store');
    Route::delete('/admin/sub-division/{sub_division}', [AdminController::class, 'sub_division_destroy'])->name('admin.sub.division.destroy');
    Route::post('/admin/position', [AdminController::class, 'position_store'])->name('admin.position.store');
    Route::delete('/admin/position/{position}', [AdminController::class, 'position_destroy'])->name('admin.position.destroy');

    // Aspiration Report
    Route::get('/admin/aspiration-report', [AdminController::class, 'aspiration_report_index'])->name('admin.aspiration.report.index');
    Route::get('/admin/aspiration-report/{aspiration}', [AdminController::class, 'aspiration_report_show'])->name('admin.aspiration.report.show');
    Route::delete('/admin/aspiration-report/{aspiration}', [AdminController::class, 'aspiration_report_destroy'])->name('admin.aspiration.report.destroy');
    // Laporan Pengaduan
    Route::get('/admin/laporan-pengaduan', [AdminController::class, 'laporan_pengaduan_index'])->name('admin.laporan.pengaduan.index');
    Route::get('/admin/laporan-pengaduan/{pengaduan}', [AdminController::class, 'laporan_pengaduan_show'])->name('admin.laporan.pengaduan.show');
    Route::get('/admin/laporan-pengaduan/{pengaduan}/edit', [AdminController::class, 'laporan_pengaduan_edit'])->name('admin.laporan.pengaduan.edit');
    Route::patch('/admin/laporan-pengaduan/{pengaduan}', [AdminController::class, 'laporan_pengaduan_update'])->name('admin.laporan.pengaduan.update');
    Route::delete('/admin/laporan-pengaduan/{pengaduan}', [AdminController::class, 'laporan_pengaduan_destroy'])->name('admin.laporan.pengaduan.destroy');

    // Content
    Route::get('/Filter/Category/{tags_op}', [AdminController::class, 'Filter_category']);

    Route::get('/admin/content', [AdminController::class, 'content_index'])->name('admin.content');
    Route::get('/admin/content/create', [AdminController::class, 'content_create'])->name('admin.content.create');
    Route::get('/admin/content/publish/{content}', [AdminController::class, 'content_publish'])->name('admin.content.publish');
    Route::post('/admin/content', [AdminController::class, 'content_store'])->name('admin.content.store');
    Route::get('/admin/content/{content}', [AdminController::class, 'content_show'])->name('admin.content.show');
    Route::get('/admin/content/{content}/edit', [AdminController::class, 'content_edit'])->name('admin.content.edit');
    Route::patch('/admin/content/{content}', [AdminController::class, 'content_update'])->name('admin.content.update');
    Route::delete('/admin/content/{content}', [AdminController::class, 'content_destroy'])->name('admin.content.destroy');

    Route::post('/admin/tag', [AdminController::class, 'tag_store'])->name('admin.tag.store');
    Route::delete('/admin/tag/{tag}', [AdminController::class, 'tag_destroy'])->name('admin.tag.destroy');
    Route::post('/admin/category', [AdminController::class, 'category_store'])->name('admin.category.store');
    Route::delete('/admin/category/{category}', [AdminController::class, 'category_destroy'])->name('admin.category.destroy');

    // Data user
    Route::get('/admin/user/0', [AdminController::class, 'user_index'])->name('admin.user');
    Route::get('/admin/user/1', [AdminController::class, 'admin_index'])->name('admin.admin');
    Route::delete('/admin/user/{user}', [AdminController::class, 'user_destroy'])->name('admin.user.destroy');

    // Slide
    Route::get('/admin/slide', [AdminController::class, 'slide_index'])->name('admin.slide');
    Route::get('/admin/slide/create', [AdminController::class, 'slide_create'])->name('admin.slide.create');
    Route::post('/admin/slide', [AdminController::class, 'slide_store'])->name('admin.slide.store');
    Route::get('/admin/slide/{slide}', [AdminController::class, 'slide_show'])->name('admin.slide.show');
    Route::get('/admin/slide/{slide}/edit', [AdminController::class, 'slide_edit'])->name('admin.slide.edit');
    Route::patch('/admin/slide/{slide}', [AdminController::class, 'slide_update'])->name('admin.slide.update');
    Route::delete('/admin/slide/{slide}', [AdminController::class, 'slide_destroy'])->name('admin.slide.destroy');
});
// End Route

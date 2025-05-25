<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Admincontroller;
use App\Http\Controllers\Members\Memberscontroller;
use App\Http\Controllers\Candidate\Candidatecontroller;
use App\Http\Controllers\Nominee\Nomineecontroller;
use App\Http\Controllers\Front\Frontcontroller;
use App\Http\Controllers\Chapter\Chaptercontroller;


Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('/clear', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Cleared!";

});



Route::get('/', [Frontcontroller::class,'index']);
Route::get('/otp', [Frontcontroller::class,'otp']);
Route::get('/ballot-paper', [Frontcontroller::class,'ballotpaper']);
Route::post('/caste', [Frontcontroller::class,'votecastcheck'])->name('front.caste');
Route::post('/verification', [Frontcontroller::class,'verificationcheck'])->name('front.verification');
Route::post('/ballotdone', [Frontcontroller::class,'ballotdone'])->name('front.ballotdone');
Route::get('/smsgateway', [Frontcontroller::class,'smsgateway']);
Route::get('/thankyou', [Frontcontroller::class,'Thankyou']);

Route::post('/resend-otp', [Frontcontroller::class,'resentOtp']);


Route::get('/admin', [Admincontroller::class,'index']);
Route::get('/admin/dashboard', [Admincontroller::class,'dashboard']);
Route::get('/admin/setup', [Admincontroller::class,'setup']);
Route::post('/admin/setup/update', [Admincontroller::class,'updatesetup'])->name('setup.update');
Route::get('/storage/{filename}', [Admincontroller::class, 'fileStorage']);

Route::get('/admin/report/city-wise', [Admincontroller::class,'Citywise']);
Route::get('/admin/report/chapter-wise', [Admincontroller::class,'Chapterwise']);
Route::get('/admin/report/candidate-wise', [Admincontroller::class,'Candidatewise']);
Route::get('/admin/report/position-wise', [Admincontroller::class,'Positionwise']);
Route::get('/admin/report/audit-report', [Admincontroller::class,'Auditreport']);

Route::post('/admin/login', [Admincontroller::class,'loginstore'])->name('admin.login');


Route::get('/admin/members', [Memberscontroller::class,'index']);
Route::get('/admin/members/bulk', [Memberscontroller::class,'bulk']);
Route::get('/admin/members/add/{id?}', [Memberscontroller::class,'create']);
Route::post('/admin/members/insert', [Memberscontroller::class,'store'])->name('members.insert');
Route::post('/admin/members/update', [Memberscontroller::class,'update'])->name('members.update');
Route::get('/admin/members/delete/{id}', [Memberscontroller::class,'destroy']);
Route::post('/admin/members/bulk', [Memberscontroller::class,'bulkstore'])->name('members.bulk');

Route::get('/admin/candidate', [Candidatecontroller::class,'index']);
Route::get('/admin/candidate/add/{id?}', [Candidatecontroller::class,'create']);
Route::post('/admin/candidate/insert', [Candidatecontroller::class,'store'])->name('candidate.insert');
Route::post('/admin/candidate/update', [Candidatecontroller::class,'update'])->name('candidate.update');
Route::get('/admin/candidate/delete/{id}', [Candidatecontroller::class,'destroy']);

Route::get('/admin/nominee', [Nomineecontroller::class,'index']);
Route::get('/admin/nominee/add/{id?}', [Nomineecontroller::class,'create']);
Route::post('/admin/nominee/insert', [Nomineecontroller::class,'store'])->name('nominee.insert');
Route::post('/admin/nominee/update', [Nomineecontroller::class,'update'])->name('nominee.update');
Route::get('/admin/nominee/delete/{id}', [Nomineecontroller::class,'destroy']);


Route::get('/admin/chapter', [Chaptercontroller::class,'index']);
Route::get('/admin/chapter/add/{id?}', [Chaptercontroller::class,'create']);
Route::post('/admin/chapter/insert', [Chaptercontroller::class,'store'])->name('chapter.insert');
Route::post('/admin/chapter/update', [Chaptercontroller::class,'update'])->name('chapter.update');
Route::get('/admin/chapter/delete/{id}', [Chaptercontroller::class,'destroy']);




Route::get('/logout',function(){
    session()->forget('ADMIN_ID');
    // session()->forget('MEMBER_NAME');
    // session()->forget('MEMBER_EMAIL');
    // session()->forget('MEMBER_TYPE');
    session()->flash('error','Logout Successfully');
    return redirect('/admin/');
    echo 'logout';
});
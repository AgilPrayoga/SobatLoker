<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OuterController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
  //     return view('welcome',[
    //         'title'=>'ini adalahh makanan',
    //         'deskripsi'=>'ini adalah web belajar'
    //     ]);
    // });
   
    Route::controller(OuterController::class)->group(function(){
      Route::get('/','index')->name('home');
      Route::get('/joblists','joblists')->name('joblists');
    });
    
    Route::controller(UsersController::class)->group(function(){
      Route::get('/home','home_user')->name('home_user');
      Route::get('/user_joblist','joblists_user')->name('joblists_user');
      Route::get('/login','login_form')->name('login_form');
      Route::post('/login','login_action')->name('login_action');
      Route::get('/register','register_form')->name('register_form');
      Route::post('/register','register_action')->name('register_action');
      Route::post('/logout','logout')->name('logout');
      Route::get('/joblists/{id}','detail')->name('detail');
      Route::get('/profile/{token}','profile')->name('profile');
      Route::post('/editprofile','edit_profile')->name('edit_profile');
      Route::get('/myjob/{id}','myjob')->name('myjob');
    });
    Route::controller(DashboardController::class)->group(function(){
      Route::get('/company','corporation_index')->name('corporation_index');
      Route::get('/jobvacancy','jobvacancy_list')->name('jobvacancy_list');
      Route::get('/dashboard/{id}','create_form')->name('create_form');
      Route::get('/job','dashboard_joblists')->name('dashboard_joblists');
      Route::post('/create','create')->name("create");
      Route::post('/delete','delete')->name('delete');
      Route::get('/edit_form','edit_form')->name('edit_form');
      Route::post('/edit','edit')->name('edit');
      Route::get('/applicant','applicant')->name('applicant');
      
    });

    Route::controller(RecruitmentController::class)->group(function(){
      Route::post('/recruitment','recruitment')->name('recruitment');
      Route::post('/cancel','cancel')->name('cancel');
    });
    
    
    
    ?>
    
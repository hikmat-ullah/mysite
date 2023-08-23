<?php

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

use App\Category;

	//Auth::routes();
Auth::routes(['verify'=>true]);

//jobs
Route::get('/', 'JobController@index');
Route::get('/jobs/create','JobController@create')->name('job.create');
Route::post('/jobs/create','JobController@store')->name('job.store');
Route::get('/jobs/{id}/edit','JobController@edit')->name('job.edit');
Route::post('/jobs/{id}/edit','JobController@update')->name('job.update');
Route::get('/jobs/my-job','JobController@myjob')->name('my.job');

Route::get('jobs/applications','JobController@applicant')->name('applicant');
Route::get('jobs/alljobs','JobController@allJobs')->name('alljobs');

//test
Route::view('demo','demo');

Route::get('/home', 'HomeController@index')->name('home');
Route::get("mysave-job", 'HomeController@mysave_job')->name('mysave-job');

Route::get("view-jobs", 'HomeController@view_jobs')->name('view-jobs');


Route::get('/jobs/{id}/{job}','JobController@show')->name('jobs.show');

//company
Route::get('/company/{id}/{company}','CompanyController@index')->name('company.index');
Route::get('company/create','CompanyController@create')->name('company.view');
Route::post('company/create','CompanyController@store')->name('company.store');
Route::post('company/coverphoto','CompanyController@coverPhoto')->name('cover.photo');
Route::post('company/logo','CompanyController@companyLogo')->name('company.logo');

//user profile
Route::get('user/profile','UserController@index');
Route::post('user/profile/create','UserController@store')->name('profile.create');
Route::post('user/coverletter','UserController@coverletter')->name('cover.letter');

Route::post('user/resume','UserController@resume')->name('resume');
Route::post('user/avatar','UserController@avatar')->name('avatar');

Route::post('user/intro-video','UserController@intro_video')->name('intro-video');

//employer view
Route::view('employer/register','auth.employer-register')->name('employer.register');
Route::post('employer/register','EmployerRegisterController@employerRegister')->name('emp.register');
// Route::post('/applications/{id}','JobController@apply')->name('apply');
Route::post('applications/{id}','JobController@apply')->name('applications');

Route::get('disable-job/{id}','JobController@disable_job')->name('disable-job');
Route::get('enable-job/{id}','JobController@enable_job')->name('enable-job');
Route::post('delete-job','JobController@delete_job')->name('delete-job');


Route::get('accept/{userid}/{jobid}','JobController@accept')->name('accept');


//save and unsave jobs
 Route::post('/save/{id}','FavouriteController@saveJob');
Route::post('/unsave/{id}','FavouriteController@unSaveJob');

//search
Route::get('jobs/search','JobController@searchJobs');

// Route::get('/greeting', function () {
//    $data = Category::all();
//    return $data;
// });


//company
Route::get('/companies','CompanyController@company')->name('company');


//category
Route::get('/category/{id}','CategoryController@index')->name('category.index');

//mail
Route::post('job/mail','EmailController@send')->name('mail');

//admin
Route::get('/dashboard','DashboardController@index')->middleware('admin');
Route::get('/dashboard/create','DashboardController@create')->middleware('admin');
Route::post('/dashboard/create','DashboardController@store')->name('post.store')->middleware('admin');
Route::post('/dashboard/destroy','DashboardController@destroy')->name('post.delete')->middleware('admin');
Route::get('/dashboard/{id}/edit','DashboardController@edit')->name('post.edit')->middleware('admin');
Route::post('/dashboard/{id}/update','DashboardController@update')->name('post.update')->middleware('admin');
Route::get('/dashboard/trash','DashboardController@trash')->middleware('admin');
Route::get('/dashboard/{id}/trash','DashboardController@restore')->name('post.restore')->middleware('admin');
Route::get('/dashboard/{id}/toggle','DashboardController@toggle')->name('post.toggle')->middleware('admin');
Route::get('/post/{id}/{slug}','DashboardController@show')->name('post.show');
Route::get('/dashboard/jobs','DashboardController@getAllJobs')->middleware('admin');

Route::post('delete-testimonial','DashboardController@delete_testimonial')->name('delete-testimonial')->middleware('admin');
Route::post('delete-post','DashboardController@delete_post')->name('delete-post')->middleware('admin');

Route::get('site-information','DashboardController@site_information')->name('site-information')->middleware('admin');

Route::get('report','DashboardController@index_report')->name('report')->middleware('admin');
Route::post('search-job-data','DashboardController@search_job_data')->name('search-job-data')->middleware('admin');


Route::post('add-webinfor','DashboardController@add_webinfor')->name('add-webinfor')->middleware('admin');

Route::get('main','DashboardController@indexmain')->name('main')->middleware('admin');








//testimonial
Route::get('testimonial/create','TestimonialController@create')->middleware('admin');
Route::post('testimonial/create','TestimonialController@store')->name('testimonial.store')->middleware('admin');
Route::get('testimonial','TestimonialController@index')->middleware('admin');


Route::get('/dashboard/{id}/jobs','DashboardController@changeJobStatus')->name('job.status')->middleware('admin');
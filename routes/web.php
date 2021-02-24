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

Route::get('/', function () {
    return view('welcome');
});
//Router to show the login page
Route::get('/login', function () {
    return view('login');
});
//Router to call the userLogin business in the controller.
Route::post('/login','UserAuthController@userLogin');
//Router for showing register form    
Route::get('/register', function () {
    
    return view('register');
});
//Router for register post business in the controller
Route::post('/register', 'UserAuthController@userRegister');

Route::get('about-us', function(){
    return view('about');
});
Route::get('contact-us', function(){
    return view('contact');
});
    
Route::get('home', function(){
    return view('home');
});

Route::get('customer', function(){
    return view('customer');
});


Route::get('jobs', function(){
    return view('jobs');
});

//----------------------------------------

Route::post('deleteHistory', 'JobHistoryController@delete');

//----------------------------------------

Route::get('/jobhistory', function(){
    return view('jobHistory');
});

Route::get('readAllJobs', 'JobHistoryController@readAllJobHistory');

//----------------------------------

// ReadAllJobs view -> update button
Route::post('updateJob', 'JobHistoryController@updateJob');

Route::post('updateJobSaved', 'JobHistoryController@updateJobSave');


//--------------------------------------------------------------------------
Route::post('createJobHistory', 'JobHistoryController@JobHistory');


Route::get('admin','AdminManagementController@readAllUsers');

//Router for register post business in the controller
Route::post('/changeStatus','AdminManagementController@ChangeUserStatus');

//Router for register post business in the controller
Route::post('/deleteUser','AdminManagementController@DeleteUser');


Route::get('myprofile','UserAuthController@UserProfile');

Route::post('myprofile','UserAuthController@UpdateUserProfile');



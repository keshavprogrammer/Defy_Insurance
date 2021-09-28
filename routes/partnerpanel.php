<?php

// use Illuminate\Support\Facades\Route;

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

Route::get('', function () {
    return redirect('/login');
})->name('index');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@submitlogin')->name('submitlogin');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth:channel_partner'], function(){
	//Dashboard
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	
	Route::get('/setting', 'SettingController@getsetting')->name('setting.getsetting');
	Route::post('/setting', 'SettingController@updatesetting')->name('setting.updatesetting');
	
	
	
	//Channel Lead
	Route::get('/managelead', 'LeadController@manage')->name('lead.manage');
	Route::get('/addlead', 'LeadController@add')->name('lead.add');
	Route::post('/addlead', 'LeadController@save')->name('lead.save');
	Route::get('/editlead/{id}', 'LeadController@edit')->name('lead.edit');
	Route::post('/editlead', 'LeadController@update')->name('lead.update');
	Route::get('/deletelead/{id}', 'LeadController@delete')->name('lead.delete');
	Route::get('/searchlead', 'LeadController@search')->name('lead.search');
	
	//Channel Partners Users
	Route::get('/managechannel_partner_user', 'Channel_partner_userController@manage')->name('channel_partner_user.manage');
	Route::get('/addchannel_partner_user', 'Channel_partner_userController@add')->name('channel_partner_user.add');
	Route::post('/addchannel_partner_user', 'Channel_partner_userController@save')->name('channel_partner_user.save');
	Route::get('/editchannel_partner_user/{id}', 'Channel_partner_userController@edit')->name('channel_partner_user.edit');
	Route::post('/editchannel_partner_user', 'Channel_partner_userController@update')->name('channel_partner_user.update');
	Route::get('/deletechannel_partner_user/{id}', 'Channel_partner_userController@delete')->name('channel_partner_user.delete');
	Route::get('/searchchannel_partner_user', 'Channel_partner_userController@search')->name('channel_partner_user.search');
	Route::post('/channelusersinglesms', 'Channel_partner_userController@channelusersinglesms')->name('channel_partner_user.channelusersinglesms');

		//Bulk SMS
	Route::get('/bulksms', 'BulksmsController@manage')->name('bulksms.manage');	
	Route::post('/bulksms', 'BulksmsController@multiplesms')->name('bulksms.save');

	
	//Ajax request
	Route::post('/ajaxGetPolicyUsingPolicytypeId', 'Client_policyplanController@ajaxGetPolicyByPolicytypeId')->name('ajax.getPolicyByPolicytype');
	
	
	
	
	
	
});

?>
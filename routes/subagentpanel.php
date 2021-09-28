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

Route::group(['middleware' => 'auth:subagent'], function(){
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
	Route::post('/leadsinglesms', 'LeadController@leadsinglesms')->name('lead.leadsinglesms');
	
	//Channel Opportunity
	Route::get('/manageopportunity', 'OpportunityController@manage')->name('opportunity.manage');
	Route::get('/addopportunity', 'OpportunityController@add')->name('opportunity.add');
	Route::post('/addopportunity', 'OpportunityController@save')->name('opportunity.save');
	Route::get('/editopportunity/{id}', 'OpportunityController@edit')->name('opportunity.edit');
	Route::post('/editopportunity', 'OpportunityController@update')->name('opportunity.update');
	Route::get('/deleteopportunity/{id}', 'OpportunityController@delete')->name('opportunity.delete');
	Route::get('/searchopportunity', 'OpportunityController@search')->name('opportunity.search');
	Route::post('/opportunitysinglesms', 'OpportunityController@opportunitysinglesms')->name('opportunity.opportunitysinglesms');
	
	
	//Client
	Route::get('/manageclient', 'ClientController@manage')->name('client.manage');
	Route::get('/addclient', 'ClientController@add')->name('client.add');
	Route::post('/addclient', 'ClientController@save')->name('client.save');
	Route::get('/editclient/{id}', 'ClientController@edit')->name('client.edit');
	Route::post('/editclient', 'ClientController@update')->name('client.update');
	Route::get('/deleteclient/{id}', 'ClientController@delete')->name('client.delete');
	Route::get('/searchclient', 'ClientController@search')->name('client.search');
	Route::post('/clientsinglesms', 'ClientController@clientsinglesms')->name('client.clientsinglesms');

	//Client_policyplan
	Route::get('/manageclientpolicy/{cid}', 'Client_policyplanController@manage')->name('clientpolicy.manage');
	Route::get('/addclientpolicy/{cid}', 'Client_policyplanController@add')->name('clientpolicy.add');
	Route::post('/addclientpolicy', 'Client_policyplanController@save')->name('clientpolicy.save');
	Route::get('/editclientpolicy/{cid}/{id}', 'Client_policyplanController@edit')->name('clientpolicy.edit');
	Route::post('/editclientpolicy', 'Client_policyplanController@update')->name('clientpolicy.update');
	Route::get('/deleteclientpolicy/{cid}/{id}', 'Client_policyplanController@delete')->name('clientpolicy.delete');
	Route::get('/searchclientpolicy/{cid}', 'Client_policyplanController@search')->name('clientpolicy.search');
	
	
	//Ajax request
	Route::post('/ajaxGetPolicyUsingPolicytypeId', 'Client_policyplanController@ajaxGetPolicyByPolicytypeId')->name('ajax.getPolicyByPolicytype');
	
	//Bulk SMS
	Route::get('/bulksms', 'BulksmsController@manage')->name('bulksms.manage');	
	Route::post('/bulksms', 'BulksmsController@multiplesms')->name('bulksms.save');

	
});

?>
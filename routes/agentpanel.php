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

Route::group(['middleware' => 'auth:agent'], function(){
	//Dashboard
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	//Agency
	Route::get('/manageagency', 'AgencyController@manage')->name('agency.manage');
	Route::get('/addagency', 'AgencyController@add')->name('agency.add');
	Route::post('/addagency', 'AgencyController@save')->name('agency.save');
	Route::get('/editagency/{id}', 'AgencyController@edit')->name('agency.edit');
	Route::post('/editagency', 'AgencyController@update')->name('agency.update');
	Route::get('/deleteagency/{id}', 'AgencyController@delete')->name('agency.delete');
	Route::get('/searchagency', 'AgencyController@search')->name('agency.search');
	
	
	//Agent
	Route::get('/manageagent', 'AgentController@manage')->name('agent.manage');
	Route::get('/addagent', 'AgentController@add')->name('agent.add');
	Route::post('/addagent', 'AgentController@save')->name('agent.save');
	Route::get('/editagent/{id}', 'AgentController@edit')->name('agent.edit');
	Route::post('/editagent', 'AgentController@update')->name('agent.update');
	Route::get('/deleteagent/{id}', 'AgentController@delete')->name('agent.delete');
	Route::get('/searchagent', 'AgentController@search')->name('agent.search');
	
	//Sub Agent
	Route::get('/managesubagent', 'SubagentController@manage')->name('subagent.manage');
	Route::get('/addsubagent', 'SubagentController@add')->name('subagent.add');
	Route::post('/addsubagent', 'SubagentController@save')->name('subagent.save');
	Route::get('/editsubagent/{id}', 'SubagentController@edit')->name('subagent.edit');
	Route::post('/editsubagent', 'SubagentController@update')->name('subagent.update');
	Route::get('/deletesubagent/{id}', 'SubagentController@delete')->name('subagent.delete');
	Route::get('/searchsubagent', 'SubagentController@search')->name('subagent.search');
	Route::post('/subagentsinglesms', 'SubagentController@subagentsinglesms')->name('subagent.subagentsinglesms');
	
	//Channel Lead
	Route::get('/managelead', 'LeadController@manage')->name('lead.manage');
	Route::get('/addlead', 'LeadController@add')->name('lead.add');
	Route::post('/addlead', 'LeadController@save')->name('lead.save');
	Route::get('/editlead/{id}', 'LeadController@edit')->name('lead.edit');
	Route::post('/editlead', 'LeadController@update')->name('lead.update');
	Route::get('/deletelead/{id}', 'LeadController@delete')->name('lead.delete');
	Route::get('/searchlead', 'LeadController@search')->name('lead.search');
	
	//Channel Opportunity
	Route::get('/manageopportunity', 'OpportunityController@manage')->name('opportunity.manage');
	Route::get('/addopportunity', 'OpportunityController@add')->name('opportunity.add');
	Route::post('/addopportunity', 'OpportunityController@save')->name('opportunity.save');
	Route::get('/editopportunity/{id}', 'OpportunityController@edit')->name('opportunity.edit');
	Route::post('/editopportunity', 'OpportunityController@update')->name('opportunity.update');
	Route::get('/deleteopportunity/{id}', 'OpportunityController@delete')->name('opportunity.delete');
	Route::get('/searchopportunity', 'OpportunityController@search')->name('opportunity.search');
	
	
	//Client
	Route::get('/manageclient', 'ClientController@manage')->name('client.manage');
	Route::get('/addclient', 'ClientController@add')->name('client.add');
	Route::post('/addclient', 'ClientController@save')->name('client.save');
	Route::get('/editclient/{id}', 'ClientController@edit')->name('client.edit');
	Route::post('/editclient', 'ClientController@update')->name('client.update');
	Route::get('/deleteclient/{id}', 'ClientController@delete')->name('client.delete');
	Route::get('/searchclient', 'ClientController@search')->name('client.search');
	
	
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
	
	//Channel Partners
	Route::get('/managechannel_partner', 'Channel_partnerController@manage')->name('channel_partner.manage');
	Route::get('/addchannel_partner', 'Channel_partnerController@add')->name('channel_partner.add');
	Route::post('/addchannel_partner', 'Channel_partnerController@save')->name('channel_partner.save');
	Route::get('/editchannel_partner/{id}', 'Channel_partnerController@edit')->name('channel_partner.edit');
	Route::post('/editchannel_partner', 'Channel_partnerController@update')->name('channel_partner.update');
	Route::get('/deletechannel_partner/{id}', 'Channel_partnerController@delete')->name('channel_partner.delete');
	Route::get('/searchchannel_partner', 'Channel_partnerController@search')->name('channel_partner.search');
	//======================================
	
	//Channel Partners Users
	Route::get('/managechannel_partner_user', 'Channel_partner_userController@manage')->name('channel_partner_user.manage');
	Route::get('/addchannel_partner_user', 'Channel_partner_userController@add')->name('channel_partner_user.add');
	Route::post('/addchannel_partner_user', 'Channel_partner_userController@save')->name('channel_partner_user.save');
	Route::get('/editchannel_partner_user/{id}', 'Channel_partner_userController@edit')->name('channel_partner_user.edit');
	Route::post('/editchannel_partner_user', 'Channel_partner_userController@update')->name('channel_partner_user.update');
	Route::get('/deletechannel_partner_user/{id}', 'Channel_partner_userController@delete')->name('channel_partner_user.delete');
	Route::get('/searchchannel_partner_user', 'Channel_partner_userController@search')->name('channel_partner_user.search');
	
		//Bulk SMS
	Route::get('/bulksms', 'BulksmsController@manage')->name('bulksms.manage');	
	Route::post('/bulksms', 'BulksmsController@multiplesms')->name('bulksms.save');

	//Agency
	
	Route::get('/setting', 'SettingController@getsetting')->name('setting.getsetting');
	Route::post('/setting', 'SettingController@updatesetting')->name('setting.updatesetting');
	
	//Marketing Enmails
	Route::get('/managemarketingemails', 'MarketingemailController@manage')->name('marketingemail.manage');
	Route::get('/addmarketingemails', 'MarketingemailController@add')->name('marketingemail.add');
	Route::post('/addmarketingemails', 'MarketingemailController@save')->name('marketingemail.save');
	Route::get('/deletemarketingemail/{id}', 'MarketingemailController@delete')->name('marketingemail.delete');
	
	
	
	//Agent Report
	Route::get('/agentreport', 'AgentReportController@manage')->name('agentreport.manage');
	Route::get('/agentsearchreport', 'AgentReportController@search')->name('agentreport.search');
	
	
	
	
	
});

?>
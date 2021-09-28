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

Route::group(['middleware' => 'auth:admin'], function(){
	//Dashboard
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	//USER
	Route::get('/manageuser', 'UserController@manage')->name('user.manage');
	Route::get('/adduser', 'UserController@add')->name('user.add');
	Route::post('/adduser', 'UserController@save')->name('user.save');
	Route::get('/edituser/{id}', 'UserController@edit')->name('user.edit');
	Route::post('/edituser', 'UserController@update')->name('user.update');
	Route::get('/deleteuser/{id}', 'UserController@delete')->name('user.delete');
	Route::get('/searchuser', 'UserController@search')->name('user.search');
	
	//Agency
	Route::get('/manageagency', 'AgencyController@manage')->name('agency.manage');
	Route::get('/addagency', 'AgencyController@add')->name('agency.add');
	Route::post('/addagency', 'AgencyController@save')->name('agency.save');
	Route::get('/editagency/{id}', 'AgencyController@edit')->name('agency.edit');
	Route::post('/editagency', 'AgencyController@update')->name('agency.update');
	Route::get('/deleteagency/{id}', 'AgencyController@delete')->name('agency.delete');
	Route::get('/searchagency', 'AgencyController@search')->name('agency.search');
	Route::post('/agencysinglesms', 'AgencyController@agencysinglesms')->name('agency.agencysinglesms');
	
	
	//Agent
	Route::get('/manageagent', 'AgentController@manage')->name('agent.manage');
	Route::get('/addagent', 'AgentController@add')->name('agent.add');
	Route::post('/addagent', 'AgentController@save')->name('agent.save');
	Route::get('/editagent/{id}', 'AgentController@edit')->name('agent.edit');
	Route::post('/editagent', 'AgentController@update')->name('agent.update');
	Route::get('/deleteagent/{id}', 'AgentController@delete')->name('agent.delete');
	Route::get('/searchagent', 'AgentController@search')->name('agent.search');
	Route::post('/agentsinglesms', 'AgentController@agentsinglesms')->name('agent.agentsinglesms');
	
	//Sub Agent
	Route::get('/managesubagent', 'SubagentController@manage')->name('subagent.manage');
	Route::get('/addsubagent', 'SubagentController@add')->name('subagent.add');
	Route::post('/addsubagent', 'SubagentController@save')->name('subagent.save');
	Route::get('/editsubagent/{id}', 'SubagentController@edit')->name('subagent.edit');
	Route::post('/editsubagent', 'SubagentController@update')->name('subagent.update');
	Route::get('/deletesubagent/{id}', 'SubagentController@delete')->name('subagent.delete');
	Route::get('/searchsubagent', 'SubagentController@search')->name('subagent.search');
	Route::post('/subagentsinglesms', 'SubagentController@subagentsinglesms')->name('subagent.subagentsinglesms');
	
	//Ajax request
	Route::post('/ajaxGetAgentUsingAgencyId', 'SubagentController@ajaxGetAgentByAgencyId')->name('ajax.getAgentByAgency');
	
	//Channel Partners
	Route::get('/managechannel_partner', 'Channel_partnerController@manage')->name('channel_partner.manage');
	Route::get('/addchannel_partner', 'Channel_partnerController@add')->name('channel_partner.add');
	Route::post('/addchannel_partner', 'Channel_partnerController@save')->name('channel_partner.save');
	Route::get('/editchannel_partner/{id}', 'Channel_partnerController@edit')->name('channel_partner.edit');
	Route::post('/editchannel_partner', 'Channel_partnerController@update')->name('channel_partner.update');
	Route::get('/deletechannel_partner/{id}', 'Channel_partnerController@delete')->name('channel_partner.delete');
	Route::get('/searchchannel_partner', 'Channel_partnerController@search')->name('channel_partner.search');
	Route::post('/channelpartnersinglesms', 'Channel_partnerController@channelpartnersinglesms')->name('channel_partner.channelpartnersinglesms');
	
	//Channel Partners Users
	Route::get('/managechannel_partner_user', 'Channel_partner_userController@manage')->name('channel_partner_user.manage');
	Route::get('/addchannel_partner_user', 'Channel_partner_userController@add')->name('channel_partner_user.add');
	Route::post('/addchannel_partner_user', 'Channel_partner_userController@save')->name('channel_partner_user.save');
	Route::get('/editchannel_partner_user/{id}', 'Channel_partner_userController@edit')->name('channel_partner_user.edit');
	Route::post('/editchannel_partner_user', 'Channel_partner_userController@update')->name('channel_partner_user.update');
	Route::get('/deletechannel_partner_user/{id}', 'Channel_partner_userController@delete')->name('channel_partner_user.delete');
	Route::get('/searchchannel_partner_user', 'Channel_partner_userController@search')->name('channel_partner_user.search');
	Route::post('/channelpartnerusersinglesms', 'Channel_partner_userController@channelpartnerusersinglesms')->name('channel_partner_user.channelpartnerusersinglesms');
	

	//Bulk SMS
	Route::get('/bulksms', 'BulksmsController@manage')->name('bulksms.manage');	
	Route::post('/bulksms', 'BulksmsController@multiplesms')->name('bulksms.save');

	
	//Policy plans
	Route::get('/managepolicyplan', 'PolicyplansController@manage')->name('policyplan.manage');
	Route::get('/addpolicyplan', 'PolicyplansController@add')->name('policyplan.add');
	Route::post('/addpolicyplan', 'PolicyplansController@save')->name('policyplan.save');
	Route::get('/editpolicyplan/{id}', 'PolicyplansController@edit')->name('policyplan.edit');
	Route::post('/editpolicyplan', 'PolicyplansController@update')->name('policyplan.update');
	Route::get('/deletepolicyplan/{id}', 'PolicyplansController@delete')->name('policyplan.delete');
	Route::get('/searchpolicyplan', 'PolicyplansController@search')->name('policyplan.search');
	
	//FAQ
	Route::get('/managefaq', 'FaqController@manage')->name('faq.manage');
	Route::get('/addfaq', 'FaqController@add')->name('faq.add');
	Route::post('/addfaq', 'FaqController@save')->name('faq.save');
	Route::get('/editfaq/{id}', 'FaqController@edit')->name('faq.edit');
	Route::post('/editfaq', 'FaqController@update')->name('faq.update');
	Route::get('/deletefaq/{id}', 'FaqController@delete')->name('faq.delete');
	Route::get('/searchfaq', 'FaqController@search')->name('faq.search');
	
	//Blog Categorie
	Route::get('/manageblogcategorie', 'BlogcategorieController@manage')->name('blogcategorie.manage');
	Route::get('/addblogcategorie', 'BlogcategorieController@add')->name('blogcategorie.add');
	Route::post('/addblogcategorie', 'BlogcategorieController@save')->name('blogcategorie.save');
	Route::get('/editblogcategorie/{id}', 'BlogcategorieController@edit')->name('blogcategorie.edit');
	Route::post('/editblogcategorie', 'BlogcategorieController@update')->name('blogcategorie.update');
	Route::get('/deleteblogcategorie/{id}', 'BlogcategorieController@delete')->name('blogcategorie.delete');
	Route::get('/searchblogcategorie', 'BlogcategorieController@search')->name('blogcategorie.search');
	
	//Blog
	Route::get('/manageblog', 'BlogController@manage')->name('blog.manage');
	Route::get('/addblog', 'BlogController@add')->name('blog.add');
	Route::post('/addblog', 'BlogController@save')->name('blog.save');
	Route::get('/editblog/{id}', 'BlogController@edit')->name('blog.edit');
	Route::post('/editblog', 'BlogController@update')->name('blog.update');
	Route::get('/deleteblog/{id}', 'BlogController@delete')->name('blog.delete');
	Route::get('/searchblog', 'BlogController@search')->name('blog.search');
	
	//Staticpages
	Route::get('/staticpages/{id}', 'StaticpageController@getpage')->name('staticpage.getpage');
	Route::post('/staticpages', 'StaticpageController@updatepage')->name('staticpage.updatepage');
	
	//Agency
	
	Route::get('/setting/{id}', 'SettingController@getsetting')->name('setting.getsetting');
	Route::post('/setting', 'SettingController@updatesetting')->name('setting.updatesetting');
	
	//Report
	Route::get('/report', 'ReportController@manage')->name('report.manage');
	Route::get('/searchreport', 'ReportController@search')->name('report.search');
	
	//Agent Report
	Route::get('/agentreport', 'AgentReportController@manage')->name('agentreport.manage');
	Route::get('/agentsearchreport', 'AgentReportController@search')->name('agentreport.search');
	
	//Partner Report
	Route::get('/partnerreport', 'PartnerReportController@manage')->name('partnerreport.manage');
	Route::get('/partnersearchreport', 'PartnerReportController@search')->name('partnerreport.search');
	
});

?>
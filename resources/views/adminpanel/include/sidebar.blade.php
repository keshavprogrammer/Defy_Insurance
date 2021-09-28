<?php 
    $menu = array(
                "Dashboard" => array(
                    "icon" => "home.png", 
                    "sub" => "dashboard"
                ),                
                "Agency Management" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Manage Agency" => "manageagency", 
                        "Add Agency" => "addagency"
                    )
                ),
                "Agent Management" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Manage Agent" => "manageagent", 
                        "Add Agent" => "addagent"
                    )
                ),
                "Sub Agent Management" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Manage Sub Agent" => "managesubagent", 
                        "Add Sub Agent" => "addsubagent"
                    )
                ),
                "Channel Partners Management" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Manage Channel Partners" => "managechannel_partner", 
                        "Add Channel Partner" => "addchannel_partner"
                    )
                ),
                "Channel Partners User Management" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Manage Channel Partner Users" => "managechannel_partner_user", 
                        "Add Channel Partner User" => "addchannel_partner_user"
                    )
                ),
                // "Policy Plans Management" => array(
                //     "icon" => "user.png", 
                //     "sub" => array(
                //         "Manage Policy Plans" => "managepolicyplan", 
                //         "Add Policy Plan" => "addpolicyplan"
                //     )
                // ),
                "FAQ Management" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Manage FAQ" => "managefaq", 
                        "Add FAQ" => "addfaq"
                    )
                ),
                "Blog Management" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Manage Categorie" => "manageblogcategorie", 
                        "Add Categorie" => "addblogcategorie",
                        "Manage Blog" => "manageblog", 
                        "Add Blog" => "addblog"
                    )
                ),
                "Staticpages Management" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Home" => "staticpages/1", 
                        "About us" => "staticpages/2",
                        "Contact us" => "staticpages/3",
                        "Terms and Condition" => "staticpages/4",
                        "Privacy Policy" => "staticpages/5"
                    )
                ),
                "Reports" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Agency Report" => "report",
                        "Agent Report" => "agentreport",
                        "Partner Report" => "partnerreport"
                    )
                ),
                "Bulk SMS" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Send Bulk SMS" => "bulksms"
                    )
                ),
                "Settings" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Settings" => "setting/1"
                    )
                ),                                
                "Log out" => array(
                    "icon" => "home.png", 
                    "sub" => "logout"
                ),
            );
?>

<div class="sidebar-main desktop-view">
    		<div class="top-logo-main" style="color: #fff; font-weight: bold;">
    			<!--<img src="{{ asset('adminpanel/images/logo1.png') }}" class="logo-img">-->
    			Defy Insurance
    			<a href="javascript:;" class="close-sidemenu"><img src="{{ asset('adminpanel/images/side.png') }}"></a>
    		</div>

    		<div class="sidebar-menu-main">
    			<ul>    				
                    <?php 
                        foreach($menu as $k => $v) { 
                            //print_r($v['sub']);
                            if(is_array($v['sub'])) {
                    ?>
                            <li class="child-menu">
                                <a href="javascript:void(0)">
                                    <span class="m-icon"><img src="{{ asset('adminpanel/images/' . $v['icon']) }}"></span>
                                    <span class="menu-text"><?php echo $k; ?></span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <?php 
                                    foreach($v['sub'] as $k1 => $v1) {
                                    ?>
                                    <li><a href="{{ url('/adminpanel/' . $v1) }}">- <?php echo $k1; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                    <?php
                            } else {
                    ?>
                            <li>
                                <a href="{{ url('/adminpanel/' . $v['sub']) }}">
                                    <span class="m-icon"><img src="{{ asset('adminpanel/images/' . $v['icon']) }}"></span>
                                    <span class="menu-text"><?php echo $k; ?></span>
                                </a>
                            </li>
                    <?php
                            }
                            
                        }
                    ?>
    			</ul>
    		</div>
    	</div>

        <!-- Mobile Menu -->

        <div class="sidebar-main mobile-view">
            <div class="top-logo-main">
                <img src="{{ URL::asset('public/images/logo1.png') }}" class="logo-img">
                <a href="javascript:;" class="close-menu"><img src="{{ URL::asset('public/images/side.png') }}"></a>
            </div>

            <div class="sidebar-menu-main">
                <ul>
                    <?php 
                        foreach($menu as $k => $v) { 
                            //print_r($v['sub']);
                            if(is_array($v['sub'])) {
                    ?>
                            <li class="child-menu">
                                <a href="#">
                                    <span class="m-icon"><img src="{{ URL::asset('public/images/' . $v['icon']) }}"></span>
                                    <span class="menu-text"><?php echo $k; ?></span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <?php 
                                    foreach($v['sub'] as $k1 => $v1) {
                                    ?>
                                    <li><a href="{{ url('/adminpanel/' . $v1) }}">- <?php echo $k1; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                    <?php
                            } else {
                    ?>
                            <li>
                                <a href="{{ route('adminpanel.' . $v['sub']) }}">
                                    <span class="m-icon"><img src="{{ URL::asset('public/images/' . $v['icon']) }}"></span>
                                    <span class="menu-text"><?php echo $k; ?></span>
                                </a>
                            </li>
                    <?php
                            }
                            
                        }
                    ?>
                    
                </ul>
            </div>
        </div>

        <!-- Mobile Menu -->
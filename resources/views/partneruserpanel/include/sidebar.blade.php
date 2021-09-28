<?php 
    $menu = array(
                "Dashboard" => array(
                    "icon" => "home.png", 
                    "sub" => "dashboard"
                ),                
                
                              
                
                "Leads Management" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Manage Leads" => "managelead", 
                        "Add Lead" => "addlead"
                    )
                ),
                // "Channel Partners User Management" => array(
                //     "icon" => "user.png", 
                //     "sub" => array(
                //         "Manage Channel Partner Users" => "managechannel_partner_user", 
                //         "Add Channel Partner User" => "addchannel_partner_user"
                //     )
                // ),                
                /*"Opportunity Management" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Manage Opportunity" => "manageopportunity"                        
                    )
                ),
                
                "Clients Management" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Manage Clients" => "manageclient", 
                        "Add Client" => "addclient"
                    )
                ),
                
                "Reports" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Agent Report" => "agentreport",                        
                    )
                ),*/ 
                "Settings" => array(
                    "icon" => "user.png", 
                    "sub" => array(
                        "Settings" => "setting"
                    )
                ),                              
                "Log out" => array(
                    "icon" => "home.png", 
                    "sub" => "logout"
                ),
            );
?>

<div class="sidebar-main desktop-view">
    		<div class="top-logo-main"style="color: #fff; font-weight: bold;">
    			<?php $clogo = asset('/uploads/agency_logo/'.Session::get('agenc_logo')); ?>
    			<img src="<?php echo $clogo; ?>" class="logo-img">
    			</br>
    			{{Session::get('agenc_name')}} </br> Channel Partner Panal
    			
    					
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
                                    <li><a href="{{ url('/partneruserpanel/' . $v1) }}">- <?php echo $k1; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                    <?php
                            } else {
                    ?>
                            <li>
                                <a href="{{ url('/partneruserpanel/' . $v['sub']) }}">
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
                                    <li><a href="{{ url('/agencypanel/' . $v1) }}">- <?php echo $k1; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                    <?php
                            } else {
                    ?>
                            <li>
                                <a href="{{ route('agencypanel.' . $v['sub']) }}">
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
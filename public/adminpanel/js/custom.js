$(document).ready(function() {
    $('.close-sidemenu').click(function() {
        $(".sidebar-main").toggleClass('sidemenu-effect');
        $('.dashboard-right-side-main').toggleClass('d-right-effect');
        $('.top-header-main').toggleClass('d-right-effect');
    });
    $('li.child-menu').click(function() {
        $(this).find("ul.sub-menu").slideToggle();
        $(this).find(".menu-arrow").toggleClass('before');
    });
    $('#menu-icon').click(function(){
        $('.sidebar-main.mobile-view').addClass('open-menu');
    });
    $('.close-menu').click(function(){
        $('.sidebar-main.mobile-view').removeClass('open-menu');
    });

    $('#basic-text1').click(function() {
        if($('#search_form')) {
            $('#search_form').submit();
        }
    });
});

var confirmDelete = function(section, url) {
	// if(confirm("Are you sure you want to delete " + section)) {
	// 	window.location.href = url;
	// }
    swal({
        title: "Are you sure?",
        text: "You want to delete this " + section,
        icon: "error",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.location.href = url;
        }
    });
};

function sendsms(section,receiverid){
    //alert(section);
    $('#smsText').modal('show');
    $('#receiverid').val(receiverid);
}

var displaySingleImagePreview = function(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
        if($('.file-upload-input')) {
        	$('.file-upload-input').css('display', 'none');
        }
    }
};
$('#birth_date').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd'
});
$('#join_date').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd'
});

$('#published_date').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd'
});

$('#start_date').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd'
});

$('#next_premium_date').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd'
});

$('#holder_birth_date').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd'
});

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

var ajaxSelectPolicyplan = function(id) {
	
	if(id == 1)
    {
		$("#vehicle_photo_div").hide();
		$("#vehicle_no_div").hide();
		$("#vehicle_engine_no_div").hide();
		$("#property_address_div").hide();
		$("#property_photo_div").hide();
		$("#property_document_photo_div").hide();						
	}
	else if(id == 2)
	{
		$("#vehicle_photo_div").show();
		$("#vehicle_no_div").show();
		$("#vehicle_engine_no_div").show();
		$("#property_address_div").hide();
		$("#property_photo_div").hide();
		$("#property_document_photo_div").hide();
	}
	else if(id == 3)
	{
		$("#vehicle_photo_div").hide();
		$("#vehicle_no_div").hide();
		$("#vehicle_engine_no_div").hide();
		$("#property_address_div").show();
		$("#property_photo_div").show();
		$("#property_document_photo_div").show();
	}
	else
	{
		$("#vehicle_photo_div").hide();
		$("#vehicle_no_div").hide();
		$("#vehicle_engine_no_div").hide();
		$("#property_address_div").hide();
		$("#property_photo_div").hide();
		$("#property_document_photo_div").hide();
	}
	
    $.ajax({
        type:'POST',
        url:'/agencypanel/ajaxGetPolicyUsingPolicytypeId',
        data:{id:id},
        dataType: "json",
        success:function(data) {
        	
            $("#policy_id").empty();
            $("#policy_id").append('<option>Select Policy Plan</option>');
            if(data) {
                $.each(data,function(key,value){
                    $("#policy_id").append('<option value="'+key+'">'+value+'</option>');
                    
                    
                    
                });
            }
        }
    });
};

var ajaxSelectAgency = function(id) {
	
	$.ajax({
        type:'POST',
        url:'/adminpanel/ajaxGetAgentUsingAgencyId',
        data:{id:id},
        dataType: "json",
        success:function(data) {
        	
            $("#agent_id").empty();
            $("#agent_id").append('<option>Select Agent</option>');
            if(data) {
                $.each(data,function(key,value){
                    $("#agent_id").append('<option value="'+key+'">'+value+'</option>');
                    
                    
                    
                });
            }
        }
    });
};
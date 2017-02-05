function get_userdata()
{
	$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>" + "index.php/Profile/getProfileData",
		dataType: 'json',
		success: function(response) 
		{ 
			if (response)
			{ 	//alert(response.name);
				// Show Entered Value	
			   $('#myModalProfile').show();
			   $(".modal-title1").html("<b>Profile -   "+ response.name +"</b>");
			   $(".modal-body1").html("<table><tr><td><b>User ID : </b></td><td> "+response.id+"</td></tr>").
				append("<tr><td><b>Name :</b></td><td> "+response.name+"</td></tr>").
				append("<tr><td><b>Email :</b></td><td> "+response.email+"</td></tr>").
				append("<tr><td><b>Date :</b></td><td> "+response.date+"</td></tr></table>");	
			}	   
			else
			{
				$(".modal-body1").html(response.msg);
			}
		}
	});
}
function edit_userdata()
{
	$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>" + "index.php/Profile/getProfileData",
		dataType: 'json',
		success: function(response) 
		{ 
			if (response)
			{ 	alert(response.email);
				// Show Entered Value	
			   $('#name').val(response.name);
			   $('#email').html(response.email);
			   $('#image').val(response.image);
			}	   
			else
			{
				$(".modal-body").html(response.msg);
			}
		}
	});
}
$("form#form_edit").submit(function(event)
{
	$('.modal').modal('hide');
    var formData = new FormData($(this)[0]);
    $.ajax({
	url: '<?php echo base_url() ?>' + 'index.php/Profile/update_userdata',
	type: 'POST',
	data: formData,
	//async: false,
	success: function (data) { 
				alert('Your details are updated');
	},
	cache: false,
	contentType: false,
	processData: false
    });
    event.preventDefault();
});
function check_current_password()
{
	var password = $('#cur_pass').val();
	$.ajax({
		type: "POST",
		data: {password : password},
		url: "index.php/Profile/check_current_password",
		dataType: 'json',
		success: function(response) 
		{ 
			//alert(response);
			if (response.status == 'success')
			{ 	
				$('.alert-pos-msg').html(response.msg);
				setTimeout( function(){ $(".alert-pos-msg").fadeOut(500); }, 6000 );
			}	   
			else
			{
				$('.alert-neg-msg').html(response.msg);
				setTimeout( function(){ $(".alert-neg-msg").fadeOut(500); }, 6000 );
			}
		}
	});
}
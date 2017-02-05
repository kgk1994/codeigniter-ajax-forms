		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script>
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
						{ 	//alert(response.email);
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
		</script>		
		<script>
			function check_current_password()
			{
				var password = $('#cur_pass').val();
				$.ajax({
					type: "POST",
					data: {password : password},
					url: "<?php echo base_url(); ?>" + "index.php/Profile/check_current_password",
					dataType: 'json',
					success: function(response) 
					{ 
						//alert(response);
						if (response.status == 'matched')
						{ 	
							$('.alert-pos-msg').html(response.msg);
							setTimeout( function(){ $(".alert-pos-msg").fadeOut(500); }, 3000 );
						}	   
						else
						{
							$('.alert-neg-msg').html(response.msg);
							setTimeout( function(){ $(".alert-neg-msg").fadeOut(500); }, 3000 );
							$('#cur_pass').focus();
							$('#cur_pass').val('');
							return false;
						}
					}
				});
			}
			/*function match_passwords()
			{
				var pass 		= 	$('#new_pass').val();
				var cpass 		= 	$('#conf_new_pass').val();
				if(pass != cpass)
				{
					alert('passwords are not matched');
					return false;
				}
			}*/
			$("#form_passwd").submit(function(event)
			{ 
				var password 	= 	$('#cur_pass').val();
				var pass 		= 	$('#new_pass').val();
				var cpass 		= 	$('#conf_new_pass').val();
				if(pass != cpass)
				{
					alert('passwords are not matched');
					return false;
				}
				else
				{ 
					var data = {
						'cur_pass' 		: $('#cur_pass').val(),
						'new_pass' 		: $('#new_pass').val(),
						'conf_new_pass' : $('#conf_new_pass').val()
					};
					
					$.ajax({
						type: "POST",
						data: data,
						url: "<?php echo base_url(); ?>" + "index.php/Profile/change_password",
						dataType: 'json',
						success: function(response) 
						{ 
							if(response.status == 'not_matched')
							{
								alert(response.msg);
							//	$('.alert-pos-msg').html(response.msg);
							//		setTimeout( function(){ $(".alert-neg-msg").fadeOut(500); }, 3000 );
							//	event.preventDefault();
								return false;
							}
							if (response.status == 'updated')
							{ 	
								alert('Password Changed');
								$('.alert-pos-msg').html(response.msg);
								window.location.href = "<?php echo base_url().'index.php/Dashboard/index'; ?>";
								//setTimeout( function(){ $(".alert-pos-msg").fadeOut(500); }, 3000 );
							}
							else
							{
								$('.alert-neg-msg').html(response.msg);
								setTimeout( function(){ $(".alert-neg-msg").fadeOut(500); }, 3000 );
							}
						}
					});
				}
			});
		</script>
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">
		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">	
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		<title>Admin</title>	
	</head>
	<body>
	<div class="container">
	<div class="row main">
		<div class="panel-heading">
       <div class="panel-title text-center">
       		<h1 class="title">Company Name</h1>
       		<hr />
       	</div>
    </div> 
		<div class="main-login main-center">
			<form id="form_reg" class="form-horizontal" method="post">
				<?php echo isset($success_msg) ? $success_msg : ''; ?>
				<div class="form-group">
					<label for="name" class="cols-sm-2 control-label">Your Name</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" required/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="cols-sm-2 control-label">Your Email</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" required/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="cols-sm-2 control-label">Password</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="confirm" id="cpassword"  placeholder="Confirm your Password" Zrequired/>
						</div>
					</div>
				</div>
				<div class="form-group">	
					<button type="submit" id="submit" name="submit" value="form_submit" class="btn btn-primary btn-lg btn-block login-button submit">Register</button>
				</div>
				<div class="login-register">
		            <a href="<?php echo base_url() ?>index.php/Login/index">Login</a>
		         </div>
			</form>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
	$("#form_reg").submit(function(event) { 
		var name = document.getElementById('name');
		var enp = /^[A-Za-z-]+[A-Za-z -]/;
		var pass = document.getElementById('password').value;
		var cpass = document.getElementById('cpassword').value;
		var email = document.getElementById('email');
		var ep = /\S+@\S+\.\S+/;
		if(pass != cpass)
		{
			alert('Passwords does not matched');
			cpass.setCustomValidity('Both Passwords should be matched');
			return false;
		}
		if(name.value == '')
		{
			alert('Name Field is Empty');
			name.setCustomValidity('Name field should not contain special characters');
			return false;
		}
		if(!enp.test(name.value))
		{
			alert('Name field should not contain Numeric values and spaces');
			return false;
		}
		if(!ep.test(email.value))
		{
			alert('Invalid email address');
			return false;
		}	
		event.preventDefault();
		var user_name 	= $("input[name=name]").val();
		var email 		= $("input[name=email]").val();
		var password 	= $("input[name=password]").val();
		jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "index.php/Register/save",
			dataType: 'json',
			data: {name: user_name,email: email, password: password},
			success: function(response) 
			{ 
				if (response)
				{
					// Show Entered Value 
					alert("You have registered");
					window.location.href = "<?php echo base_url().'index.php/Login/index'; ?>";
				}
			}
		});
	});
});
</script>
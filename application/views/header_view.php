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
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		      </button>
		      <a class="navbar-brand" href="#">Logo</a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav">
			<li class="active"><a href="#">Home</a></li>
			<?php 
				if($this->session->userdata('user_id') != '') 
				{
			?>
			<li class="dropdown">
        		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile
			    <span class="caret"></span></a>
			    <ul class="dropdown-menu">
				<li><a id='prof' style="cursor: pointer;" data-toggle="modal" data-target="#myModalProfile" onclick="get_userdata();">Profile View</a></li>
				<li><a id='prof_edit' style="cursor: pointer;" data-toggle="modal" data-target="#myModalProfileEdit" onclick="edit_userdata();"> Profile Edit </a></li>
				<li><a id='change_pass' style="cursor: pointer;" data-toggle="modal" data-target="#changePassword"> Change Password </a></li>
			    </ul>
      		</li>
			<?php
				}
			?>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
			<li><a href="<?php echo base_url() ?>index.php/Home/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<div class="modal fade" id="myModalProfile" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title1"></h4>
					</div>
					<div class="modal-body1">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModalProfileEdit" role="dialog">
			<form id="form_edit" method="post" enctype="multipart/form-data">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Edit User Details</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="name">Name<span class="required">*</span></label>
								<input type="text" class="form-control" id="name" value="" name="name" placeholder="Enter Name">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<span  id="email"></span>
							</div>
							<div class="form-group">
								<label for="image">Upload Your Image<span class="required">*</span></label>
								<input type="file" class="form-control" id="image" value="" name="image" placeholder="">
							</div>	
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success" id="save_data" name="save_data">Update</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal fade" id="changePassword" role="dialog">
			<form id="form_passwd" method="post" enctype="multipart/form-data">
				<div class="modal-dialog changePassword">
					<div class="modal-content">
						<div class="modal-header changePassword">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title changePassword">Change Password</h4>
						</div>
						<div class="modal-body changePassword">
							<div class="form-group">
								<label for="current_password">Current Password<span class="required">*</span></label>
								<input type="password" class="form-control" onchange="check_current_password();" id="cur_pass" value="" name="cur_pass" placeholder="Enter Current Password" required="required">
								<div role="alert" class="alert-neg-msg"></div>
								<div role="alert" class="alert-pos-msg"></div>
							</div>
							<div class="form-group">
								<label for="new_password">New Password<span class="required">*</span></label>
								<input type="password" class="form-control" id="new_pass" value="" name="new_pass" placeholder="Enter New Password" pattern=".{6,30}" required="required">
							</div>
							<div class="form-group">
								<label for="conf_new_password">Confirm New Password<span class="required">*</span></label>
								<input type="password" class="form-control" id="conf_new_pass" value="" name="conf_new_pass" pattern=".{6,30}" onchange="match_passwords();" placeholder="Confirm New Password" required="required">
							</div>
						</div>
						<div class="modal-footer changePassword">
							<button type="submit" id='cpass_button' class="btn btn-success" id="save_pass" name="save_pass">Update</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Company Name</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form id="form_reg" class="form_horizontal">
						<?php echo isset($success_msg) ? $success_msg : ''; ?>
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>
						<div class="form-group">	
								<button type="submit" id="submit" name="submit" value="form_submit" class="btn btn-primary btn-lg btn-block login-button submit">Login</button>
						<div id='success-msg' style="color:green; display:none;">Login Success</div>
						<div id='fail-msg' style="color:red;display:none;">Login failed</div>
						</div>
						<div class="login-register">
				            <a href="<?php echo base_url() ?>index.php/Register/index">Register</a>
				         </div>
					</form>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script>
		/* AJAX Form Submission */
		$(document).ready(function() { 
			$("#form_reg").submit(function(event) {
				event.preventDefault();
				var email = $("input[name=email]").val();
				var password = $("input[name=password]").val();
				jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "index.php/Login/check",
					dataType: 'json',
					data: {email: email, password: password},
					success: function(response) 
					{ 
						if (response.status == 'success')
						{
							$('#success-msg').show();
							window.location.href = "<?php echo base_url().'index.php/Dashboard/index'; ?>";
						}
						else
						{
							$('#fail-msg').show();
							setTimeout( function(){ $("#fail-msg").fadeOut(500); }, 30 );
						}
					}
				});
			});
		});
		/* AJAX Form Submission */
		</script>
	</body>
</html>
		

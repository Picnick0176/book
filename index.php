<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <title>ระบบยืมคืนหนังสือ</title>
	<link rel="stylesheet" href="index.css">

  </head>
  <body>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<center><h1>ระบบยืมคืนหนังสือ</h1></center>
				<hr>
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="process.php?cmd=login" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="process.php?cmd=register" method="post" role="form" style="display: none;">
								
									<h3>ข้อมูลเข้าระบบ</h3>
									<div class="form-group">
										<input type="text" name="username" id="username" class="form-control" placeholder="Username" value="">
									</div>

									<div class="form-group">
										<input type="password" name="password" id="password"  class="form-control" placeholder="Password">
									</div>
									
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<h3>ข้อมูลทั่วไป</h3>
									<div class="form-group">
										<select class="form-control" name="MTitle" id="MTitle">
												<option>เลือกคำนำหน้าชื่อ</option>
												<option value="นาย">นาย</option>
												<option value="นางสาว">นางสาว</option>
											
										</select>
									</div>
									
									<div class="form-group">
										<input type="text" name="MFname" id="MFname" class="form-control" placeholder="ชื่อ">
									</div>
									<div class="form-group">
										<input type="text" name="MLname" id="MLname" class="form-control" placeholder="นามสกุล">
									</div>
									<div class="form-group">
										
										 <select class="form-control" name="MGender" id="MGender">
												<option>เลือกเพศ</option>
												<option value="ชาย">ชาย</option>
												<option value="หญิง">หญิง</option>
										</select>
									</div>
									<div class="form-group">
										<!-- <input type="text" name="MLevel" id="MLevel" class="form-control" placeholder="ระดับชั้น"> -->
										<select class="form-control" name="MLevel" id="MLevel">
												<option>ระดับชั้น</option>
												<option value="1">ม.1</option>
												<option value="2">ม.2</option>
												<option value="3">ม.3</option>
												<option value="4">ม.4</option>
												<option value="5">ม.5</option>
												<option value="6">ม.6</option>
										</select>
									</div>
									<div class="form-group">
										<input type="text" name="MRoom" id="MRoom" class="form-control" placeholder="ห้อง">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" class="form-control btn btn-register" value="Register Now">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

</script>
  
  
  
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<html>
	<head>
			
		<meta charset="utf-8">
		<title>Sign Up</title>
		{{-- bootstrap --}}
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		{{--  --}}
		{{-- jquery validate --}}
		<script type="text/javascript" src="jquery_validate/jquery.validate.min.js"></script>


	</head>

	<body>
		<div class="container-fluid content">
			
			<div class="col-md-6 center" >
				<form action="" method="post" id="form-signUp">
					  {{csrf_field()}}
					  <div class="form-group border-bottom">
					  		<h3>Sign in</h3>
					  </div>
					  <div class="form-group">
						    <label >User Name<span class="required">*</span></label>
						    <input type="text" id="userName" class="form-control" name="userName" >
					   </div>
					  <div class="form-group">
						    <label >Email Address<span class="required">*</span></label>
						    <input type="email" id="mail" class="form-control"  name="email" >
					   </div>
					   
					  <div class="form-group">
						    <label >Password<span class="required">*</span></label>
						    <input type="password" class="form-control" id="pass"  name="pass" >
					  </div>
					  <div class="form-group">
						    <label >Confirm Password<span class="required">*</span></label>
						    <input type="password" class="form-control"  name="pass_confirm" >
					  </div>

					  <span style="margin-left: 15%">By creating an account, you agree to our Terms of Service.</span>
					  <button type="submit" class="btn btn-primary mt-3 mb-3" style="margin-left: 38%">Create Account</button>
					  @if(isset($message))
					  	<div class="alert alert-success">{{$message}}</div>
					  	<a href="{{route('login')}}" class="btn btn-success mb-3 pl-5 pr-5" style="margin-left: 38%">Login</a>
					  @endif

					  @if(isset($error))
						<div class="alert alert-danger">{{$error}}</div>
						
					  @endif

				</form>

			</div>

		</div>


		<style>
			.content{
				background-image: url('images/background_signUp.jpg');
				height: 800px;
				padding-top: 6%;
			}
			.center {
			    margin: auto;
			    background: white;
			    padding: 20px;
			    align-items: center;
			}
			label.error,span.required{
				color: red;
			}
			

		</style>
		{{-- js --}}
		<script type="text/javascript" src="js/myJs.js"></script>
	</body>
</html>
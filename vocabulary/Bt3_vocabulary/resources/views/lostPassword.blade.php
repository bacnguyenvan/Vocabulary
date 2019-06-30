<html>
	<head>
			
		<meta charset="utf-8">
		<title>Lost password</title>
		{{-- bootstrap --}}
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		{{--  --}}
		{{-- jquery validate --}}
		<script type="text/javascript" src="jquery_validate/jquery.validate.min.js"></script>

		{{-- icon --}}
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	</head>

	<body>
		<div class="container-fluid content">
			
			<div class="col-md-6 center" >
				<form action="{{route('lostPassword')}}" method="post" id="form-lostPassword">
					  {{csrf_field()}}
					  <div class="form-group">
						    <label for="exampleInputEmail1">Email Address</label>
						    <input name="email" type="email" class="form-control" id="email" placeholder="Enter email" >
					   </div>
					  <div class="form-group">
						    <label for="exampleInputEmail1">Email Address confirm</label>
						    <input name="email_confirm" type="email" class="form-control" placeholder="Enter email confirm" >
					   </div>
					  
					  <button type="submit" class="btn btn-primary mt-3" style="margin-left: 40%">Get password</button>
					  <div class="col-md-12">
					  	<a href="{{route('login')}}"><i class="fa fa-arrow-circle-left mr-3"></i>back to login</a>
					  </div>
					  @if(isset($message))
					  	<div class="alert alert-danger">{{$message}}</div>
					  @endif

					  @if(isset($error))
					  	<div class="alert alert-danger">{{$error}}</div>
					  @endif

					  @if(isset($success))
					  	<div class="alert alert-success">{{$success}}</div>
					  @endif
				</form>

			</div>

		</div>


		<style>
			.content{
				background:#ddd;
				height: 750px;
				padding-top: 15%;
			}
			.center {
			    margin: auto;
			    background: white;
			    padding: 20px;
			    align-items: center;
			}
			label.error{
				color: red;
			}

			
		</style>
		{{-- js --}}
		<script type="text/javascript" src="js/myJs.js"></script>
	</body>
</html>
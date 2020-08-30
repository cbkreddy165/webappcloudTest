<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

		<!-- Bootstrap Core CSS -->
		<link href="{{url('/')}}/public/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="{{url('/')}}/public/css/landing-page.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="{{url('/')}}/public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	
		<style>
			.intro-header2 {
				padding-top: 50px;
				padding-bottom: 50px;
				

			}
			.intro-message2{
				margin: 0 auto;
				width: 400px;
				min-height: 400px;
			}
			.intro-message2 h1{
				text-align:center;
			}
			.btnBlue{
				    background: #4e6ab9;
			}
		</style>
	
    </head>
    <body>
	
   <!-- Navigation -->
    @include('nav')
	
	
	
    <a name="about"></a>
    <div class="intro-header2">
        <div class="container">

            <div class="row">
                <div class="">
                    <div class="intro-message2">
                        <h1>Add Products</h1>
						
						@if ($message = Session::get('success'))

							<div class="alert alert-success alert-block">

								<button type="button" class="close" data-dismiss="alert">×</button>

									<strong>{{ $message }}</strong>

							</div>

						

						@endif
						
						
						<!-- Edit Info -->
						
						@if ($editID == TRUE)
							
							<form action="{{url('/')}}/saveTeamData" enctype="multipart/form-data" method="post">
							 {{ csrf_field() }}
							  <div class="form-group">
								<label for="name">Product Name:</label>
								<input type="text" class="form-control" id="name" name="name" value="{{$productsList->name}}">
							  </div>
							  <div class="form-group">
								<label for="name">Product code:</label>
								<input type="text" class="form-control" id="code" name="code" value="{{$productsList->code}}">
							  </div>
								<input type="hidden" class="form-control" id="id" name="editid" value="{{$editID}}">
							  <button type="submit" class="btn btn-default btnBlue">Update</button>
							</form>
							
						@else
							
							<form action="{{url('/')}}/saveProductData" enctype="multipart/form-data" method="post">
								 {{ csrf_field() }}
							  <div class="form-group">
								<label for="name">Product Name:</label>
								<input type="text" class="form-control" id="name" name="name">
							  </div>
							  <div class="form-group">
								<label for="name">Product Code:</label>
								<input type="text" class="form-control" id="code" name="code">
							  </div>
							 
							  <button type="submit" class="btn btn-default btnBlue">Submit</button>
							</form>
							
							
						@endif
						
						
						
                    </div>
                </div>
				
				
				
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
	
	
	 <!-- Footer -->
	  @include('footer')
    

    </body>
</html>

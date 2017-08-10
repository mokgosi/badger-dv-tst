<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Collective - Edit</title>

        <!-- Fonts -->
        <link href="../../public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../public/css/parsley.css" rel="stylesheet" type="text/css">
        <link href="../../public/css/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>            
		<div class="row">
		    <div class="col-md-8 col-md-offset-2">
		        <div class="">
		            <div class="panel-heading"><h2>Collectiv</h2></div>
		            <div class="panel-body">
		            	
		            	<div style="display: none" class="alert alert-success" role="alert"></div>
		            	<div style="display: none" class="alert alert-danger" role="alert"></div>

		            	<form class="form-horizontal" action="/user/update" method="post" data-parsley-validate="">
			                <div class="form-group">
				               	<label for="firstName" class="control-label col-sm-2">First Name</label>
							    <div class="col-sm-10">
							    	<input type="text" name="firstName" class="form-control  col-sm-4" 
							    		required="" value="<?php echo $data['first_name'] ?>"/>

							    	<input type="hidden" name="id" class="form-control  col-sm-4" value="<?php echo $data['id'] ?>"/>	
							    </div>
							</div>
							<div class="form-group">
				               	<label for="lastName" class="control-label col-sm-2">Last Name</label>
							    <div class="col-sm-10">
							    	<input type="text" name="lastName" class="form-control  col-sm-4" 
							    		required="" value="<?php echo $data['last_name'] ?>"/>
							    </div>
							</div>
							<div class="form-group">
				               	<label for="email" class="control-label col-sm-2">Email</label>
							    <div class="col-sm-10">
							    	<input type="email" name="email" class="form-control  col-sm-4" 
							    		required="" value="<?php echo $data['email'] ?>"
							    		data-parsley-trigger="change"/>
							    </div>
							</div>
							<div class="form-group">
				               	<label for="username" class="control-label col-sm-2">Username</label>
							    <div class="col-sm-10">
							    	<input type="text" name="username" class="form-control  col-sm-4" 
							    		required="" value="<?php echo $data['username'] ?>" />
							    </div>
							</div>
							<div class="form-group">
				               	<label for="password" class="control-label col-sm-2">Passoword</label>
							    <div class="col-sm-10">
							    	<input type="text" name="password" class="form-control  col-sm-4" required=""
							    		value="" />
							    </div>
							</div>
							<div class="button-group pull-right">
				               	<a href="/user/index" class="btn btn-default btn-round-sm">Cancel</a>
								<button type="submit" class="btn btn-success btn-round-sm"
									data-loading-text="<span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Updating...">
										Update</button>
							</div>
		            	</form>
		            </div>
		        </div>
		    </div>
		</div>
		<script src="../../public/js/jquery-3.1.1.min.js"></script>
		<script src="../../public/js/bootstrap.min.js"></script>
		<script src="../../public/js/parsley.min.js"></script>
		<script src="../../public/js/main.js"></script>
    </body>
</html>


<!DOCTYPE html>
<html>
<head>
	<title>Ajax File Upload</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container wrapper">
	<div class="row">
		<div class="col-md-4">
			<form enctype="multipart/form-data" id="myform">
				<div class="form-group">
					<input type="file" name="myfile" id="upload_file" class="form_control">
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="show"></div>
		</div>
	</div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on("change","#upload_file", function(){
			$.ajax({
				type : "POST",
				url  : "ajax.php",
				data : new FormData($("#myform")[0]),
				contentType : false,
				processData : false,
				success: function(feedback){
					$(".show").html(feedback);
				}
			});
		});
	});
</script>
</body>
</html>
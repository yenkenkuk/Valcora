<html>
<head>
	<title>Valcora v0.1</title>
	<link rel="icon" href="icon.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="bootstrap.min.js"></script>
	
</head>
<body>
	<div>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		
		    <a class="navbar-brand">
				<img src="icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
			</a>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item">
				<a class="nav-link" href="./index.php">Home</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="./usage.php">Usage</a>
			  </li>
			  <li class="nav-item active">
				<a class="nav-link" href="#">Upload</a>
			  </li>
			</ul>
		  </div>
		</nav>
	</div>
	
	<?php
	if(isset($_POST["submit"])) {
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "<div class=\"alert alert-danger\" role=\"alert\">";
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " already exists.";
			echo "</div>";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "<div class=\"alert alert-success\" role=\"alert\">";
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded!";
			echo "</div>";
		  } else {
			echo "<div class=\"alert alert-danger\" role=\"alert\">";
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " failed to upload!";
			echo "</div>";
		  }
		}
	}
	?>
	
	<div class="container">
		<br>
		<div class="card" style="width: 32rem;">
			<div class="card-body">
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<!--<div class="form-group">
						<input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
						<br>
						<input type="submit" class="btn btn-primary" value="Upload" name="submit">
					</div>-->
					<div class="input-group mb-3">
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload">
							<label class="custom-file-label" for="fileToUpload">Choose file</label>
						</div>
						<div class="input-group-append">
							<input type="submit" class="input-group-text" value="Upload" name="submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

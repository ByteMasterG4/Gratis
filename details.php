<?php
if(!isset($_GET['id']) || empty($_GET['id'])){
	header("location: index.php");
	exit;
}
?>
<!doctype html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    	<title>Details</title>
    	<?php include 'css/style.css'; ?>
	</head>
	<body>
		<div class="container-fluid my-container">
			<div class="row bg-primary my-head">
				<div class="col-lg">
					<h1><?php echo 'MyCars'; ?></h1>
				</div>
				<div class="col-sm">
					<p class="text-right"><a href="logout.php" class="btn btn-danger">Sign Out</a></p>
				</div>
			</div>
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark nav">
				<ul class="navbar-nav">
			    	<li class="nav-item active">
			      		<a class="nav-link" href="index.php">Inventory</a>
			    	</li>
			  </ul>
			</nav>
			<div class="row rmb">
				<?php include 'sql/inc.details.php' ?>
				<p>The information on the vehicle provided on this page is supplied by the dealer or other third parties. We are not responsible for any errors or omissions contained on these pages. Sales Tax, Title, License Fee, Registration Fee, Documentation Fee are additional to the advertised price. While every effort has been made to ensure display of accurate data, the vehicle listings within this web site may not reflect all accurate vehicle items. The vehicle stock photo(s) displayed may be an example only. Pricing throughout the web site does not include any options that may have been installed at the dealership. Please see the dealer for more details.</p>
		  	</div>
		
		</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
	</html>
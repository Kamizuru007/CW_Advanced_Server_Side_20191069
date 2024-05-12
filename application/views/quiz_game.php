<?php include 'common/header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Quiz Box</title>
	<style>
		body {
		font-family: Arial, sans-serif;
		background-color: #f0f0f0;
		margin: 0;
		padding: 0;
		}

		#container {
			width: 50%;
			margin: 100px auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		h1 {
			text-align: center;
			color: #333;
		}

		form {
			text-align: center;
		}

		input[type="submit"] {
			padding: 10px 20px;
			background-color: #007bff;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}

		input[type="submit"]:hover {
			background-color: #0056b3;
		}

	</style>


</head>
<body>

<div id="container">
	<h1>Welcome to Quiz!</h1>


<form method="" action="<?php echo base_url();?>index.php/Questions/quizdisplay">

	<input type="submit" value="Start">
  
</form> 


</div>

</body>
</html>
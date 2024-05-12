<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Box</title>
  <link rel="stylesheet" href="styles.css">
  	<style>
		body {
		margin: 0;
		font-family: Arial, sans-serif;
		}

		.navbar {
		background-color: #333;
		color: #fff;
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 10px 20px;
		}

		.navbar a {
		text-decoration: none;
		color: #fff;
		}

		.logo a {
		font-size: 1.5rem;
		font-weight: bold;
		}

		.nav-links {
		list-style: none;
		margin: 0;
		padding: 0;
		display: flex;
		}

		.nav-links li {
		margin-left: 20px;
		}

		.nav-links li:first-child {
		margin-left: 0;
		}

		.welcome-message {
		text-align: center;
		padding: 50px 20px;
		}

		.welcome-message h1 {
		font-size: 2rem;
		margin-bottom: 10px;
		}

		.welcome-message p {
		font-size: 1.2rem;
		}
	</style>

</head>
<body>
  <nav class="navbar">
    <div class="logo">
      <a href="#">QUIZ BOX</a>

    </div>
    <ul class="nav-links">
      <li><a href="<?php echo base_url('index.php/HomeController/Login');?>">Login</a></li>
      <li><a href="<?php echo base_url('index.php/HomeController/Register');?>">Register</a></li>
    </ul>
  </nav>
</body>
</html>

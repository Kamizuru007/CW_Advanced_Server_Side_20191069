
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Simple Quiz App with Backbone.js</title>
    <style>
		/* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Container Styles */
        #container {
            width: 50%;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Heading Styles */
        h1 {
            text-align: center;
            color: #333;
        }

        /* Form Styles */
        form {
            text-align: center;
        }

        /* Submit Button Styles */
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

        /* Navbar Styles */
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

        /* Welcome Message Styles */
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

        /* Quiz Container Styles */
        .quiz-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Heading Styles */
        h2 {
            margin-top: 0;
            color: #333;
        }

        /* List Styles */
        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        /* Label Styles */
        label {
            margin-left: 5px;
        }

        /* Button Styles */
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* New Question Input Styles */
        .new-question-input {
            margin-bottom: 10px;
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.1/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.4.0/backbone-min.js"></script>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
        <a href="<?php echo base_url('index.php/AdminController/index1'); ?>">QUIZ BOX</a>

        </div>
        <ul class="nav-links">
        <li><a href="<?php echo base_url('index.php/AdminController/index'); ?>">Create/Delete/Edit</a></li>
        <li><a href="<?php echo base_url('index.php/LoginController/LogoutUser'); ?>">Logout</a></li>
        </ul>
    </nav>
    <div id="container">
	<h1>Welcome to Quiz!</h1>
    <form method="" action="<?php echo base_url();?>index.php/Questions/quizdisplay">

        <input type="submit" value="Start">
    
    </form> 

    

</body>
</html>

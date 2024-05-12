<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Play Quiz</title>

    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        }

        #container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        p {
            font-weight: bold;
        }

        input[type="radio"] {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>
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
        body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        }
        .quiz-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
            color: #333;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        label {
            margin-left: 5px;
        }
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
        .new-question-input {
            margin-bottom: 10px;
        }
    </style>

    <style>
        .commentcreate li a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50; /* Green background color */
            color: white; /* White text color */
            text-decoration: none; /* Remove underline */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s ease; /* Smooth transition */
        }

        .commentcreate li a:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>

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
    
    <div id="container" style="display: block;">
        <h1>Play the Quiz!</h1>
        
        <form method="post" action="<?php echo base_url();?>index.php/Questions/resultdisplay">
        
        
            <?php foreach($questions as $row) { ?>
            
            <?php $ans_array = array($row->option1, $row->option2, $row->option3, $row->option4); 
            shuffle($ans_array); 
            $type_array = array($row->qtype); 
            ?>
            <?php
            $num = $_POST['num'];
            ?>
        
            <?php if ($type_array[0] == $num) { ?>
            <p><?=$row->quizID?>.<?=$row->question?></p>
            <input type="radio" name="quizid<?=$row->quizID?>" value="<?=$ans_array[0]?>" required> <?=$ans_array[0]?><br>
            <input type="radio" name="quizid<?=$row->quizID?>" value="<?=$ans_array[1]?>"> <?=$ans_array[1]?><br>
            <input type="radio" name="quizid<?=$row->quizID?>" value="<?=$ans_array[2]?>"> <?=$ans_array[2]?><br>
            <input type="radio" name="quizid<?=$row->quizID?>" value="<?=$ans_array[3]?>"> <?=$ans_array[3]?><br>
            <?php } ?>
            
            <?php } ?>
            

            <br><br>
            <input type="submit" value="Submit!">
        
        </form>  
    </div>



    <div class="container">
		<h1>User Comments</h1>
        <div id="data">
            <table>
                <?php foreach ($comments as $row) { ?>
                <tr>
                    <td><?=$row->commentText?></td>
                </tr>
                
                <?php } ?>
            </table>
        </div>

    </div>
   
    <p id="message"></p>
	<p id="createmsg"></p>

	<br>

	<h3>Create a Comment</h3>
   
   <br>

    <ul class="commentcreate">
        <li><a href="<?php echo base_url('index.php/Questions/createcommentdislay'); ?>">Create Or Delete Comment</a></li>
    </ul>

   
  	

</body>
</html>


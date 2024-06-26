<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Play Quiz</title>

    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        /* Container Styles */
        #container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Heading Styles */
        h1, h2 {
            text-align: center;
            color: #333;
        }

        /* Form Styles */
        form {
            margin-top: 20px;
        }

        /* Paragraph Styles */
        p {
            margin: 10px 0;
        }

        /* Span Styles */
        span {
            padding: 5px 10px;
            border-radius: 5px;
        }

        span.bg-correct {
            background-color: #ADFFB4;
        }

        span.bg-incorrect {
            background-color: #FF9C9E;
        }

        /* Score Heading Styles */
        h1.score {
            font-size: 36px;
            margin-top: 10px;
        }

        /* Submit Button Styles */
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
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
        <h1>Play the Quiz!</h1>
        
        <?php $score =0; ?>
        
        <?php $array1= array(); ?>
        <?php $array2= array(); ?>    
        <?php $array3= array(); ?>
        <?php $array4= array(); ?>
        <?php $array5= array(); ?>
        <?php $array6= array(); ?>
        <?php $array7= array(); ?>
        <?php $array8= array(); ?>
        
        <?php foreach($checks as $checkans) { ?>
        <?php array_push($array1, $checkans); } ?>
                
                
        <?php foreach($results as $res) { ?>
        <?php array_push($array2, $res->answer); 
            array_push($array3, $res->quizID); 
            array_push($array4, $res->question); 
            array_push($array5, $res->option1); 
            array_push($array6, $res->option2); 
            array_push($array7, $res->option3); 
            array_push($array7, $res->option4); 
            array_push($array8, $res->answer); 
        } ?>
                
                
        <?php for ($x=0; $x <10; $x++) { ?>
    
        <form method="post" action="<?php echo base_url();?>index.php/Questions/quizdisplay?">  
    
        
            <p><?=$array3[$x]?>.<?=$array4[$x]?></p>
            

            <?php if ($array2[$x]!=$array1[$x]) { ?>
            
                <p><span style="background-color: #FF9C9E"><?=$array1[$x]?></span></p>
                <p><span style="background-color: #ADFFB4"><?=$array2[$x]?></span></p>
                
            <?php } else { ?>
            
                <p><span style="background-color: #ADFFB4"><?=$array1[$x]?></span></p>
                
                <?php $score = $score + 1; ?>
            
            <?php } } ?>
            
            <br><br>
            
            <h2>Your Score: </h2>
            <h1><?=$score?>/10</h1>
            
            <input type="submit" value="Play Again!">
        
        </form>
        
    </div>

</body>
</html>
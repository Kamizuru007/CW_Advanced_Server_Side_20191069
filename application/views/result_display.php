<?php include 'common/header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Play Quiz</title>

    <style>
        body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
        }

        #container {
            width: 80%;
            margin: 20px auto;
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
            margin-top: 20px;
        }

        p {
            margin: 10px 0;
        }

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

        h2 {
            text-align: center;
            margin-top: 40px;
            color: #333;
        }

        h1.score {
            text-align: center;
            color: #333;
            font-size: 36px;
            margin-top: 10px;
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
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>

</head>
<body>

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
    
        <form method="post" action="<?php echo base_url();?>index.php/welcome/index">  
    
        
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
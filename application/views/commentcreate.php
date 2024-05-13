<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Create Comment</title>

    <style>
       /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Container Styles */
        #container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Heading Styles */
        h1 {
            text-align: center;
        }

        /* Form Styles */
        form {
            margin-top: 20px;
        }

        /* Paragraph Styles */
        p {
            font-weight: bold;
        }

        /* Radio Button Styles */
        input[type="radio"] {
            margin-bottom: 10px;
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
    

    <div class="container">
		<h1>User Comments</h1>
        <div id="data">
            <table>
                <?php foreach ($commentspg as $row) { ?>
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

   <form>
   
	
        <label for='commentText'> Comment Here :  </label>
		<input type='text' name='commentText' id='commentText' size='30' /> <br>

		<input type="submit" value="Create" id="create" />
   
   </form>
   
   <br><br>


   <script>
	
		$(document).ready(function() {
			
			$("#create").click(function(event) {
				event.preventDefault();
				var commentText = $("input#commentText").val();  
				
			$.ajax({
				method: "POST",
				url: "<?php echo base_url(); ?>index.php/Questions/comment",	
				dataType: 'JSON',
				data: {commentText: commentText},
				
				success: function(data) {
					console.log(commentText);
					$("#data").load(location.href + " #data");
					$("input#commentText").val(""); 
					
				}
			});
			});
		});
		
  	</script>
  	

</body>
</html>


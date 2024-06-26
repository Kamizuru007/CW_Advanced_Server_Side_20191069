<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Create/Edit/Delete</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

	<style>
		/* General Styles */
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f4f4f4;
		}

		/* Container Styles */
		.container {
			width: 80%;
			margin: 0 auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		/* Heading Styles */
		h1, h3 {
			color: #333;
		}

		/* Form Styles */
		form {
			margin-bottom: 20px;
		}

		/* Label Styles */
		label {
			display: block;
			margin-bottom: 5px;
		}

		/* Text Input Styles */
		input[type="text"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}

		/* Submit Button Styles */
		input[type="submit"] {
			background-color: #007bff;
			color: #fff;
			border: none;
			padding: 10px 20px;
			cursor: pointer;
			border-radius: 5px;
		}

		input[type="submit"]:hover {
			background-color: #0056b3;
		}

		/* Table Styles */
		table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
		}

		table td, table th {
			padding: 10px;
			border: 1px solid #ddd;
			text-align: left;
		}

		/* Message Styles */
		#message, #createmsg {
			background-color: #4CAF50;
			color: white;
			padding: 10px;
			margin-top: 20px;
			text-align: center;
			display: none;
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
	</style>

</head>
<body>
	<nav class="navbar">
		<div class="logo">
		<a href="<?php echo base_url('index.php/AdminController/index1'); ?>">QUIZ BOX</a>

		</div>
		<ul class="nav-links">
			<li><a href="<?php echo base_url('index.php/AdminController/index1'); ?>">Take Quiz</a></li>
			<li><a href="<?php echo base_url('index.php/LoginController/LogoutUser'); ?>">Logout</a></li>
		</ul>
	</nav>
	<div class="container">
		<h1>Create/Edit/Delete</h1>
		<h3>Already Here</h3>
	<div id="data">
		<table>
			<?php foreach ($names as $row) { ?>
			<tr>
				<td><?=$row->quizID?></td>
				<td><?=$row->question?></td>
				<td><?=$row->option1?></td>
				<td><?=$row->option2?></td>
				<td><?=$row->option3?></td>
				<td><?=$row->option4?></td>
				<td><?=$row->answer?></td>
			</tr>
			
			<?php } ?>
		</table>
	</div>

	<br>

	<p id="message"></p>
	<p id="createmsg"></p>

	<br> <br><br>

	<h3>Create Quizzes</h3>

   <form>
   
		<label for='question'> Question </label>
		<input type='text' name='question' id='question' size='30' /> <br>

		<label for='option1'> Option1 </label>
		<input type='text' name='option1' id='option1' size='30' /> <br>
		
		<label for='option2'> Option2 </label>
		<input type='text' name='option2' id='option2' size='30' /> <br>

		<label for='option3'> Option3 </label>
		<input type='text' name='option3' id='option3' size='30' /> <br>

		<label for='option4'> Option4 </label>
		<input type='text' name='option4' id='option4' size='30' /> <br>

		<label for='answer'> Answer </label>
		<input type='text' name='answer' id='answer' size='30' /> <br>

		<label for='qtype'> Category </label>
		<input type='text' name='qtype' id='qtype' size='30' /> <br>
		
		<input type="submit" value="Create" id="create" />
   
   </form>
   
   <br><br>
   <h3>Delete/Edit Quizzes</h3>

   <form>
     	<label for="edit"> Type in the id to delete/edit</label>
       	<input type="text" name="quizID" id="quizID" size="10" /> <br>
       
		<input type="submit" value="Delete" id="delete" />
		<input type="submit" value="Edit" id="edit" />
   </form>
   
   <br>

   <div id="editBox" style="display: none;"> 
		<form>

			<input type="hidden" name="quizID" id="quizID" size="20" /> <br>
			<h3>Edit Quizzes</h3>
			<label for="editquestion">Edit Question</label>
			<input type="text" name="editquestion" id="editquestion" size="30" /> <br>
			
			<label for="editquestion">Edit Option1</label>
			<input type="text" name="editoption1" id="editoption1" size="30" /> <br>

			<label for="editquestion">Edit Option2</label>
			<input type="text" name="editoption2" id="editoption2" size="30" /> <br>

			<label for="editquestion">Edit Option3</label>
			<input type="text" name="editoption3" id="editoption3" size="30" /> <br>

			<label for="editquestion">Edit Option4</label>
			<input type="text" name="editoption4" id="editoption4" size="30" /> <br>
			
			<label for="editquestion">Edit Answer</label>
			<input type="text" name="editanswer" id="editanswer" size="30" /> <br>

			<label for="editquestion">Edit Category</label>
			<input type="text" name="editqtype" id="editqtype" size="30" /> <br>
			
			<input type="submit" value="Update" id="update">

		</form>
   
   </div>
   
   </div>
   
   
  	<script>
	
		$(document).ready(function() {
			
			$("#create").click(function(event) {
				event.preventDefault();
				var question = $("input#question").val();  
				var option1 = $("input#option1").val(); 
				var option2 = $("input#option2").val(); 
				var option3 = $("input#option3").val(); 
				var option4 = $("input#option4").val(); 
				var answer = $("input#answer").val(); 
				var qtype = $("input#qtype").val(); 
			$.ajax({
				method: "POST",
				url: "<?php echo base_url(); ?>index.php/Quizz/person",	
				dataType: 'JSON',
				data: {question: question, option1: option1, option2: option2,option3: option3,option4: option4,answer: answer,qtype: qtype},
				
				success: function(data) {
					console.log(question, option1,option2,option3,option4, answer,qtype);
					$("#data").load(location.href + " #data");
					$("input#question").val(""); 
					$("input#option1").val(""); 
					$("input#option2").val(""); 
					$("input#option3").val(""); 
					$("input#option4").val(""); 
					$("input#answer").val("");  
					$("input#qtype").val("");
				}
			});
			});
		});
		
		
		$(document).ready(function() {
			$("#delete").click(function(event) {
				event.preventDefault();
				var quizID  = $("input#quizID ").val();  
			$.ajax({
				method: "GET",
				url: "<?php echo base_url(); ?>index.php/Quizz/person",	
				dataType: 'JSON',
				data: {quizID : quizID },
				success: function(data) {
					console.log(quizID );
					$("#data").load(location.href + " #data");
					$("#message").html("You have successfully deleted number " + quizID  + " Thank you");
					$("#message").show().fadeOut(5000);
					$("input#quizID ").val("");  
				}
			});
			});
		});
		
		
		
		$(document).ready(function() {
			$("#edit").click(function(event) {
				event.preventDefault();
				var quizID  = $("input#quizID ").val();  
			$.ajax({
				method: "GET",
				url: "<?php echo base_url(); ?>index.php/Quizz/user",	
				dataType: 'JSON',
				data: {quizID : quizID },
				
				success: function(data) {
					
					$.each(data,function(quizID , question, option1,option2,option3,option4, answer,qtype) {
					
					console.log(quizID , question, option1,option2,option3,option4, answer,qtype);
					$("input#quizID ").val(quizID ); 
					$("#editBox").show();
					$("input#editquestion").val(question[0]);
					$("input#editoption1").val(question[1]);
					$("input#editoption2").val(question[2]);
					$("input#editoption3").val(question[3]);
					$("input#editoption4").val(question[4]);
					$("input#editanswer").val(question[5]);
					$("input#editqtype").val(question[6]);
					});
				}
			});
			});
		});
		
		
		
		$(document).ready(function() {
			
			$("#update").click(function(event) {
				event.preventDefault();
				var quizID  = $("input#quizID ").val();
				var question = $("input#editquestion").val();  
				var option1 = $("input#editoption1").val(); 
				var option2 = $("input#editoption2").val(); 
				var option3 = $("input#editoption3").val(); 
				var option4 = $("input#editoption4").val(); 
				var answer = $("input#editanswer").val(); 
				var qtype = $("input#editqtype").val();
			$.ajax({
				method: "POST",
				url: "<?php echo base_url(); ?>index.php/Quizz/user",	
				dataType: 'JSON',
				data: {quizID : quizID , question: question, option1: option1, option2: option2,option3: option3,option4: option4,answer: answer,qtype: qtype},
				
				success: function(data) {
					console.log(quizID , question, option1, option2, option3,option4,answer,qtype);
					$("#data").load(location.href + " #data");
					$("#message").html("You have successfully updated " + question + " Thank you");
					$("#message").show().fadeOut(5000);
					$("#editBox").hide();
					
				}
			});
			});
			});
		
		
			$(document).ready(function() {
				
				var Create = Backbone.Model.extend({
					url: function () {
						var link = "<?php echo base_url(); ?>index.php/Quizz/person?question=" + this.get("question");
						return link;
					},
					defaults: {
						question: null,
						option1: null,
						option2: null,
						option3: null,
						option4: null,
						answer: null }
				});
				
				var createModel = new Create();
				
				var DisplayView = Backbone.View.extend({
					el: ".container", 
					model: createModel,
					initialize: function () {
						this.listenTo(this.model,"sync change",this.gotdata);
					},
					
					events: {
						"click #create" : "getdata"
					},
					
					getdata: function (event) {
						var question = $('input#question').val();
						var option1 = $('input#option1').val();
						var option2 = $('input#option2').val();
						var option3 = $('input#option3').val();
						var option4 = $('input#option4').val();
						var answer = $('input#answer').val();
						this.model.set({question: question, option1: option1,option1: option1, option1: option1, answer: answer});
						this.model.fetch();
					},
					
					gotdata: function () {
						$('#createmsg').html('Question ' + this.model.get('question') +  ' has been created').show().fadeOut(5000);
					}
				});
				
				var displayView = new DisplayView();
				
			});
	
  	</script>



</div>

</body>
</html>
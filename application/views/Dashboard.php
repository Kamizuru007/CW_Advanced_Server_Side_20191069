
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Simple Quiz App with Backbone.js</title>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.1/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.4.0/backbone-min.js"></script>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
        <a href="#">QUIZ BOX</a>

        </div>
        <ul class="nav-links">
        <li><a href="<?php echo base_url('index.php/AdminController/index'); ?>">Create/Delete/Edit</a></li>
        <li><a href="<?php echo base_url('index.php/LoginController/LogoutUser'); ?>">Logout</a></li>
        </ul>
    </nav>
    <div class="quiz-container">
        <h2>Create New Quiz</h2>
        <input type="text" id="quiz-title-input" placeholder="Enter Quiz Title">
        <div class="new-question">
            <input type="text" class="new-question-input" placeholder="Enter Question">
            <input type="text" class="new-option-input" placeholder="Option 1">
            <input type="text" class="new-option-input" placeholder="Option 2">
            <input type="text" class="new-option-input" placeholder="Option 3">
            <input type="text" class="new-option-input" placeholder="Option 4">
            <input type="text" class="new-answer-input" placeholder="Correct Answer">
            <button id="addQuestion">Add Question</button>
            <button id="saveQuiz">Save Quiz</button>
        </div>
    </div>

    <div class="quiz-container" id="quiz-container"></div>

    <script type="text/template" id="quiz-template">
        <h2><%= title %></h2>
        <ul>
            <% questions.forEach(function(question) { %>
                <li>
                    <h3><%= question.question %></h3>
                    <ul>
                        <% question.options.forEach(function(option) { %>
                            <li><input type="radio" name="<%= question.id %>" value="<%= option %>"> <label><%= option %></label></li>
                        <% }); %>
                    </ul>
                </li>
            <% }); %>
        </ul>
        <button id="submit">Submit</button>
    </script>

    <script>
        // Model
        var Question = Backbone.Model.extend({
            defaults: {
                question: '',
                options: [],
                answer: ''
            }
        });

        var QuizModel = Backbone.Model.extend({
            defaults: {
                title: '',
                questions: []
            }
        });

        // Collection
        var QuizCollection = Backbone.Collection.extend({
            model: QuizModel
        });

        // View
        var QuizView = Backbone.View.extend({
            el: '#quiz-container',
            template: _.template($('#quiz-template').html()),

            initialize: function() {
                this.render();
            },

            render: function() {
                this.$el.empty();
                this.collection.forEach(function(quizModel) {
                    this.$el.append(this.template({ title: quizModel.get('title'), questions: quizModel.get('questions') }));
                }, this);
                return this;
            },

            events: {
                'click #submit': 'submitQuiz',
                'click #addQuestion': 'addQuestion',
                'click #saveQuiz': 'saveQuiz'
            },

            submitQuiz: function() {
                var score = 0;
                this.collection.forEach(function(quizModel) {
                    quizModel.get('questions').forEach(function(question) {
                        var selectedAnswer = $('input[name=' + question.id + ']:checked').val();
                        if (selectedAnswer === question.answer) {
                            score++;
                        }
                    });
                });
                alert('Your score is: ' + score);
            },

            addQuestion: function() {
                var newQuestion = {
                    id: Math.random().toString(36).substr(2, 9), // Generate random ID
                    question: $('.new-question-input').val(),
                    options: [],
                    answer: $('.new-answer-input').val()
                };
                $('.new-option-input').each(function() {
                    newQuestion.options.push($(this).val());
                });
                this.currentQuiz.get('questions').push(newQuestion);
                $('.new-question-input').val('');
                $('.new-option-input').val('');
                $('.new-answer-input').val('');
                this.render();
            },

            saveQuiz: function() {
                var title = $('#quiz-title-input').val();
                if (!title) {
                    alert('Please enter a title for the quiz.');
                    return;
                }
                var quiz = new QuizModel({
                    title: title,
                    questions: []
                });
                this.collection.add(quiz);
                this.currentQuiz = quiz;
                $('#quiz-title-input').val('');

                // Send data to server
                $.ajax({
                    url: 'save_quiz.php',
                    type: 'POST',
                    data: { title: quiz.get('title'), questions: JSON.stringify(quiz.get('questions')) },
                    success: function(response) {
                        console.log(response); // Handle success response
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Handle error
                    }
                });
            }
        });

        // Initialize
        var quizzes = new QuizCollection();

        var quizView = new QuizView({ collection: quizzes });
    </script>

</body>
</html>

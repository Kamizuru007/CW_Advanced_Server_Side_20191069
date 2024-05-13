<?php include 'common/header.php'?>
  <style>
    /* General Styles */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
    }

    /* Container Styles */
    .container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Box Styles */
    .box {
        margin-bottom: 20px;
    }

    /* Form Box Styles */
    .form-box {
        padding: 20px;
    }

    /* Form Header Styles */
    .form-box header {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    /* Field Styles */
    .field {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    /* Field Label Styles */
    .field label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    /* Input Styles */
    .field input[type="text"],
    .field input[type="password"] {
        width: 93%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* Submit Button Styles */
    .field input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .field input[type="submit"]:hover {
        background-color: #ffcc00;
    }

    /* Links Styles */
    .links {
        text-align: center;
    }

    .links a {
        color: #333;
        text-decoration: none;
    }

    .links a:hover {
        text-decoration: underline;
    }

  </style>

<body>
      <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <?php if ($this->session->flashdata('msg')){
              echo "<h3>".$this->session->flashdata('msg')."</h3>";

            }
            ?>
            <hr>
            <?php echo validation_errors(); ?>
            <?php echo form_open('LoginController/LoginUser'); ?>

               
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" placeholder="Email">
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" placeholder="Password">
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have an account? <a href="<?php echo base_url('index.php/HomeController/Register');?>">Sign up Now</a>
                </div>

            <?php echo form_close(); ?>
        </div>
      </div>
</body>
</html>
<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BilkentCodes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <div class="navbar-brand">BilkentCodes</div>
      <form action="about.php" method="POST" class="d-flex">
        <button class="btn btn-info btn-large">About</button>
      </form>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="main-box">
      <div class="left-box">
        <div class="left-box-header">
          <h2>Great to meet you! If you are a user, register here.</h2>
        </div>

        <?php
        include("config.php");
        function register($mysqli) {
          $username = $_POST['username'];
          $name = $_POST['name'];
          $email = $_POST['email'];
          $password = $_POST['password'];

          if ($username == "" && $name == "" && $email == "" && $password == "") {
            echo '<script> alert("Please enter your username and password") </script>';
            return;
          }
          else if ($username == "") {
              echo '<script> alert("Please enter your username") </script>';
              return;
          }
          else if ($name == "") {
            echo '<script> alert("Please enter your name") </script>';
            return;
          }
          else if ($email == "") {
            echo '<script> alert("Please enter your email") </script>';
            return;
          }
          else if ($password == "") {
            echo '<script> alert("Please enter your password") </script>';
            return;
          }

          $rs = $mysqli->query("" .
                               "SELECT * " .
                               "FROM User " .
                               "WHERE username = '$username' ");

          if ($rs) {
            if ($rs->num_rows > 0) {
              echo '<script> alert("The username already exists") </script>';
            }
            else {
              $mysqli->query("INSERT INTO User(username, name, email, password) VALUES " .
                             "('$username', '$name', '$email', '$password')");
              $_SESSION['username'] = $username;
              header("location: userHomePage.php");
            }
          }
          else {
            // Error with the query
            header("location: userRegister.php");
          }
        }

        if (isset($_POST['register'])) {
          register($mysqli);
        }
        ?>

        <form action="userRegister.php" method="POST" id="login">
          <div class="forms">
            <input type="text" class="data-box" placeholder="Username" name="username">
            <input type="text" class="data-box" placeholder="Name" name="name">
            <input type="text" class="data-box" placeholder="Email" name="email">
            <input type="password" class="data-box" placeholder="Password" name="password">
            <div class="button-box">
              <button class="btn btn-primary btn-large login" type="submit" name="register">Register</button>
            </div>
          </div>
        </form>
        <div class="left-footer">
          <p>If you already have an account, you can login from <strong><a href="userLogin.php">login</a></strong>.</p>
        </div>
      </div>
      <div class="right-box">
        <form action="companyRegister.php">
          <button class="btn btn-primary btn-large change-company">Register As A Company</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>

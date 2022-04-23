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
          <h2>Welcome back! If you are a company, login here.</h2>
        </div>

        <?php
        include("config.php");
        function login($mysqli) {
          $company_id = $_POST['company_id'];
          $password = $_POST['password'];

          if ($company_id == "" && $password == "") {
            echo '<script> alert("Please enter your id and password") </script>';
            return;
          }
          else if ($company_id == "") {
              echo '<script> alert("Please enter your id") </script>';
              return;
          }
          else if ($password == "") {
            echo '<script> alert("Please enter your password") </script>';
            return;
          }

          $rs = $mysqli->query("" .
                               "SELECT * " .
                               "FROM Company " .
                               "WHERE company_id = '$company_id' AND password = '$password' ");

          // login is successful
          if ($rs) {
            if ($rs->num_rows > 0) {
              $_SESSION['company_id'] = $company_id;
              // TODO
              // header("location: companyHomePage.php");
            }
            else {
              echo '<script> alert("Wrong input!") </script>';
            }
          }
          else {
            // Error with the query
            header("location: companyLogin.php");
          }
        }

        if (isset($_POST['login'])) {
          login($mysqli);
        }
        ?>

        <form action="companyLogin.php" method="POST" id="login">
          <div class="forms">
            <input type="text" class="data-box" placeholder="Id" name="company_id">
            <input type="password" class="data-box" placeholder="Password" name="password">
            <div class="button-box">
              <button class="btn btn-primary btn-large login" type="submit" name="login">Login</button>
            </div>
          </div>
        </form>
        <div class="left-footer">
          <p>If you do not have an account yet, you can create one by <strong><a href="companyRegister.php">registering</a></strong>.</p>
        </div>
      </div>
      <div class="right-box">
        <form action="userLogin.php">
          <button class="btn btn-primary btn-large change-company">Login As A User</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>

<?php
include('session.php');
?>

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
      <a href="editorHomePage.php" class="navbar-brand">BilkentCodes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bstarget="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item nav-links">
            <a class="nav-link" href="userProfile.php">Your Profile</a>
          </li>
          <li class="nav-item">
            <form action="userHomePage.php" method="POST" id="logout">
              <div>
                <button class="btn btn-primary btn-large" type="submit" name="logout">Log Out</button>
              </div>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
      $company_id = $_POST['company_id'];
      $editor_id = $_SESSION['editor_id'];
      print_r($company_id);
      print_r($_POST['company_name']);
      $query = "INSERT INTO verify(editor_id, company_id) VALUES ('$editor_id', '$company_id')";
      if ($mysqli->query($query3)->num_rows == 0 && $mysqli->query($query4)->num_rows == 1) {
        if ($mysqli->query($query) && $mysqli->query($query2)) {
          echo "<div class='alert alert-success' role='alert'>
          <h4 class='alert-heading'>Success!</h4>
          <p>You have successfully applied to this company.</p>
          <hr>
          <p class='mb-0'>You will be redirected to the application page in 3 seconds.</p>
          </div>";
          header("refresh:3;url=application.php");
        }
      } else {
        echo "<div class='alert alert-danger' role='alert'>
      <h4 class='alert-heading'>Error!</h4>
      <p>You have failed to apply to this company.</p>
      <hr>
      <p class='mb-0'>You will be redirected to the application page in 3 seconds.</p>
      </div>";
        header("refresh:3;url=application.php");
      }
      ?>
</body>
</html>
<?php
include("session.php");

if (isset($_POST['logout'])) {
  session_destroy();
  header("location: userLogin.php");
}

$item_id = $_GET['item_id'];
$rs_challenge = $mysqli->query("" .
  "SELECT problem_statement, difficulty " .
  "FROM Challenge " .
  "WHERE item_id = '$item_id'");
$row = mysqli_fetch_array($rs_challenge);
$problem_statement = $row['problem_statement'];
$difficulty = $row['difficulty'];

$rs_category =
  $mysqli->query("" .
    "SELECT category_name " .
    "FROM Category " .
    "WHERE category_name IN ( " .
    "SELECT category_name " .
    "FROM has_category " .
    "WHERE item_id = $item_id)");
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

  <script>

  </script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a href="userHomePage.php" class="navbar-brand">BilkentCodes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bstarget="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item nav-links">
            <a class="nav-link" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="yellow" class="bi bi-mailbox" viewBox="0 0 16 16">
                <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z" />
                <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z" />
              </svg>
            </a>
          </li>
          <li class="nav-item nav-links">
            <a class="nav-link" href="userProfile.php">Your Profile</a>
          </li>
          <li class="nav-item nav-links">
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

  <div class="challenge-body">
    <div class="challenge-header">
      <a href="#" class="btn btn-danger">View Solutions</a>
      <div class="challenge-top">
        ID-NAME OF THE CHALLENGE
      </div>
      <a href="#" class="btn btn-success">View Previous Submissions</a>
    </div>
    <div class="challenge-body-content">
      <div class="challenge-left">
        <p>
          <strong>Diffuculty:</strong><?php echo $difficulty; ?>
          <br>
          <strong>Language:</strong> EXAMPLE 1, EXAMPLE 2, EXAMPLE 3
          <br>
          <strong>Category:</strong>
          <?php
          while ($category_row = mysqli_fetch_array($rs_category)) :
            echo $category_row['category_name'] . " ";
          endwhile;
          ?>
        </p>
        <hr class="opacity-100">
        <p>
          <strong>Problem Specification:</strong>
          <?php
          echo $problem_statement;
          ?>
        </p>
      </div>
      <div class="challenge-right">
        <select class="form-select language-selector" aria-label="Select Language">
          <option selected>Open this select menu</option>
          <option value="Java">Java</option>
          <option value="JS">JS</option>
          <option value="C">C</option>
        </select>
        <textarea name="challenge-code" id="challenge-code" class="challenge-code" placeholder="// Code Here"></textarea>
      </div>

    </div>
    <div class="challenge-footer">
      <a href="#" class="btn btn-info">Submit</a>
    </div>
  </div>


</body>

</html>

<?php
include("session.php");

if (isset($_POST['logout'])) {
  session_destroy();
  header("location: editorLogin.php");
}

include("config.php");
$username = $_SESSION['editor_id'];
$rs_challenges = $mysqli->query("" .
  "SELECT * " .
  "FROM Challenge ");

$today_date = date("Y-m-d");
$rs_contests = $mysqli->query("" .
  "SELECT * " .
  "FROM Contest " .
  "WHERE date >= '$today_date'");

if (isset($_POST['verify'])) {
  $company_id = $_POST['company_id'];
  $editor_id = $_SESSION['editor_id'];
  $query = "INSERT INTO verify(editor_id, company_id) VALUES ('$editor_id', '$company_id')";
  $mysqli->query($query);
}

$rs_not_verified_companies = $mysqli->query("" .
  "SELECT company_id, name " .
  "FROM Company " .
  "WHERE company_id NOT IN ( " .
  "SELECT company_id " .
  "FROM verify) ");
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

  <div class="user-home-content">
    <div class="user-home-left-box">
      <div class="user-home-left-box-upper">
        <div class="editor-home-left-box-upper-header">
          <button class="btn btn-primary invisible">Filter</button>
          <h3 title="Scroll down to see more">Challenges</h3>
          <div class="editor-home-left-box-upper-header-button-group">
            <a href="editorNewCodingChallenge.php" class="btn btn-danger">Create New Coding Challenge</a>
            <a href="editorNewNonCodingChallenge.php" class="btn btn-danger">Create New Non-Coding Challenge</a>
          </div>
        </div>
        <div class="user-home-left-box-upper-content">
          <?php
          while ($row = mysqli_fetch_array($rs_challenges)) :
            $item_id = $row['item_id'];
            $difficulty = $row['difficulty'];

            echo "<div class=\"user-all-announcements-content-bottom-links-box\"><a href=\"#\" class=\"btn btn-outline-secondary user-home-left-box-upper-challenge\">$item_id - Challenge</a></div>";
          endwhile;
          ?>
        </div>
      </div>
      <div class=" user-home-left-box-bottom">
        <div class="user-home-left-box-bottom-header">
          <h3 title="Scroll down to see more">Upcoming Contests</h3>
        </div>
        <div class="user-home-left-box-bottom-content">
          <?php
          while ($row = mysqli_fetch_array($rs_contests)) :
            $item_id = $row['item_id'];
            $name = $row['name'];

            echo "<div class=\"user-all-announcements-content-bottom-links-box\"><a href=\"#\" class=\"btn btn-outline-secondary user-home-left-box-bottom-contest\">$name</a></div>";
          endwhile;
          ?>
        </div>
        <div class="user-home-left-box-bottom-footer">
          <a href="editorNewContest.php" class="btn btn-primary user-home-left-box-bottom-button">Create New Contests</a>
        </div>
      </div>
    </div>
    <div class="user-home-right-box">
      <div class="editor-home-right-box-header">
        <h3 title="Scroll down to see more">Companies</h3>
      </div>
      <div class="user-home-right-box-content">
        <?php
        while ($row = mysqli_fetch_array($rs_not_verified_companies)) :
          $name = $row['name'];
          $company_id = $row['company_id'];
          echo "
           <div class=\"editor-home-right-box-verify\">
            <h5 class=\"editor-home-right-box-verify-detail-top\">$name</h5>
            <form action=\"editorHomePage.php\" method=\"POST\">
             <input type=\"hidden\" name=\"company_id\" value=\"$company_id\">
             <button class=\"btn btn-primary\" type=\"submit\" name=\"verify\">Verify</button>
            </form>
           </div>
           ";
        endwhile;
        ?>
      </div>
      <div class="user-home-right-box-footer">
        <a href="editorVerifiedCompanies.php" class="btn btn-primary">View Verified Companies</a>
      </div>
    </div>
  </div>
</body>

</html>

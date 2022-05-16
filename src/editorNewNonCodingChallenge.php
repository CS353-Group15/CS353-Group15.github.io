<?php /*
include("session.php");

if (isset($_POST['logout'])) {
  session_destroy();
  header("location: userLogin.php");
}

include("config.php");
$username = $_SESSION['username'];
$rs_challenges = $mysqli->query("" .
  "SELECT * " .
  "FROM Challenge ");

$today_date = date("Y-m-d");
$rs_contests = $mysqli->query("" .
  "SELECT * " .
  "FROM Contest " .
  "WHERE date >= '$today_date'");

$rs_announcements = $mysqli->query("" .
  "SELECT * " .
  "FROM Announcement "); */
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
      <div class="navbar-brand">BilkentCodes</div>
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


  <div class="editor-new-coding-challenge">
    <div class="editor-new-coding-challenge-header">
      <a href="#" class="btn btn-success">View Solutions</a>
      <input type="text" class="form-control challenge-name" placeholder="Name">
      <select class="form-select difficulty-selector" aria-label="Difficulty">
        <option selected>Difficulty</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>

    <div class="editor-new-coding-challenge-content">
      <div class="editor-new-coding-challenge-content-left">
        <div class="editor-new-coding-challenge-content-left-top">
          <textarea name="new-coding-challenge-description" id="new-coding-challenge-description" placeholder="Problem Specification..." class="form-control new-coding-challenge-description"></textarea>
        </div>
        <div class="editor-new-coding-challenge-category">
          <div class="editor-new-coding-challenge-add-category">

          </div>
        </div>
        <div class="editor-new-coding-challenge-language">
          <div class="editor-new-coding-challenge-add-category">

          </div>
        </div>
      </div>
      <div class="editor-new-coding-challenge-content-right">
        <div class="editor-new-coding-challenge-content-right-top">
          <textarea name="new-coding-challenge-solution" id="new-coding-challenge-solution" placeholder="Solution..." class="form-control new-non-coding-challenge-solution"></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="editor-new-coding-challenge-submit">
    <a href="#" class="btn btn-primary">Submit</a>
  </div>

</body>

</html>
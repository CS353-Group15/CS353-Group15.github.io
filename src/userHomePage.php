<?php
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
  "FROM Announcement ");

if (isset($_POST['filterChallenge']) && (isset($_POST['categories']))) {
  $query = "SELECT * " .
    "FROM Challenge NATURAL JOIN has_category ";

  $categories = $_POST['categories'];
  if (count($categories) > 0) {
    $query = $query . "WHERE ";
  }
  foreach ($categories as $i => $c) {
    $query = $query . "category_name = '$c' ";
    if ($i < count($categories) - 1)
      $query = $query . "OR ";
  }

  $rs_challenges = $mysqli->query($query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BilkentCodes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" />
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
        <div class="user-home-left-box-upper-header">
          <button class="btn btn-primary" id="userHomeFilterChallengeBtn">Filter</button>

          <form action="userHomePage.php" method="POST">
            <div id="challengeFilterBackground" class="modal-background">
              <div class="modal-content">
                <span class="modal-close">&times;</span>
                <script type="text/javascript">
                  $(document).ready(function() {
                    var s2 = $("#filterChallengeSelect").select2({
                      placeholder: "Categories",
                      tags: true
                    });

                    var vals = ["Trees", "Hashing", "Strings"];

                    vals.forEach(function(e) {
                      if (!s2.find('option:contains(' + e + ')').length)
                        s2.append($('<option>').text(e));
                    });
                  });
                </script>
                <select class="js-example-basic-multiple" name="categories[]" multiple="multiple" style="width:100%;" id="filterChallengeSelect"></select>
                <div style="display:flex; flex-direction: row-reverse; justify-content: end;">
                  <button class="btn btn-primary btn-large" type="submit" name="filterChallenge" style="margin:10px">Filter Challenges</button>
                </div>
              </div>
            </div>
          </form>

          <script type="text/javascript">
            var modal_background = document.getElementById("challengeFilterBackground");
            var btn = document.getElementById("userHomeFilterChallengeBtn");
            var close_span = document.getElementsByClassName("modal-close")[0];

            btn.onclick = function() {
              modal_background.style.display = "block";
            }

            close_span.onclick = function() {
              modal_background.style.display = "none";
            }

            modal_background.onclick = function(event) {
              if (event.target == modal_background) {
                modal_background.style.display = "none";
              }
            }
          </script>

          <h3>Challenges</h3>
          <button class="btn btn-danger">Random Challenge With Filters</button>
        </div>
        <div class="user-home-left-box-upper-content">
          <?php
          while ($row = mysqli_fetch_array($rs_challenges)) :
            $item_id = $row['item_id'];
            $difficulty = $row['difficulty'];

            echo "<div class=\"user-all-announcements-content-bottom-links-box\"><a href=\"challenge.php?item_id=$item_id\" class=\"btn btn-outline-secondary user-home-left-box-upper-challenge\">Challenge $item_id, Difficulty: $difficulty </a></div>";
          endwhile;
          ?>
        </div>
      </div>
      <div class=" user-home-left-box-bottom">
        <div class="user-home-left-box-bottom-header">
          <h3>Upcoming Contests</h3>
        </div>
        <div class="user-home-left-box-bottom-content">
          <?php
          while ($row = mysqli_fetch_array($rs_contests)) :
            $item_id = $row['item_id'];
            $name = $row['name'];

            echo "<div class=\"user-all-announcements-content-bottom-links-box\"><a href=\"#\" class=\"btn btn-outline-secondary user-home-left-box-bottom-contest\">Contest $item_id: $name</a></div>";
          endwhile;
          ?>
        </div>
        <div class="user-home-left-box-bottom-footer">
          <a href="userEnrolledContests.php" class="btn btn-primary user-home-left-box-bottom-button">View Enrolled Contests</a>
        </div>
      </div>
    </div>
    <div class="user-home-right-box">
      <div class="user-home-right-box-header">
        <h3>Announcements</h3>
      </div>
      <div class="user-home-right-box-content">
        <?php
        $counter = 0;
        while ($row = mysqli_fetch_array($rs_announcements)) :
          $item_id = $row['announcement_id'];
          $title = $row['title'];
          echo
          "<div class=\"user-home-right-box-announcement\">
            <div class=\"user-home-right-box-announcement-save\">
              <a href=\"#\" class=\"user-home-right-box-announcement-save-button\">
                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-bookmarks\" viewBox=\"0 0 16 16\">
                  <path d=\"M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z\" />
                  <path d=\"M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z\" />
                </svg>
              </a>
            </div>
            <div class=\"user-home-right-box-announcement-detail\">
              <h5>Company Name</h5>
              <a href=\"#\" class=\"user-home-right-box-announcement-detail-link\"><strong>$title</strong></a>
            </div>
          </div>";
        endwhile;
        ?>
      </div>
      <div class="user-home-right-box-footer">
        <a href="userSavedAnnouncements.php" class="btn btn-primary">View Saved Announcements</a>
      </div>
    </div>
  </div>
</body>

</html>
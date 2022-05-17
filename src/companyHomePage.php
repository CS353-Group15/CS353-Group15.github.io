<?php
include("session.php");

if (isset($_POST['logout'])) {
  session_destroy();
  header("location: companyLogin.php");
}

include("config.php");
$username = $_SESSION['company_id'];
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
      <a href="companyHomePage.php" class="navbar-brand">BilkentCodes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bstarget="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item nav-links">
            <a class="nav-link" href="companyAllInvites.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="yellow" class="bi bi-mailbox" viewBox="0 0 16 16">
                <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z" />
                <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z" />
              </svg>
            </a>
          </li>
          <li class="nav-item nav-links">
            <a href="companyProfile.php" class="nav-link" href="companyProfile.php">Your Profile</a>
          </li>
          <li class="nav-item">
            <form action="companyHomePage.php" method="POST" id="logout">
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
          <h3 title="Scroll down to see more">Interviews</h3>
          <a href="companyNewInvite.php" class="btn btn-danger">Send new interview invite</a>
        </div>
        <div class="user-home-left-box-upper-content">
          <?php /*
          while ($row = mysqli_fetch_array($rs_challenges)) :
            $item_id = $row['item_id'];
            $difficulty = $row['difficulty'];

            echo "<div class=\"user-all-announcements-content-bottom-links-box\"><a href=\"#\" class=\"btn btn-outline-secondary user-home-left-box-upper-challenge\">Interview $item_id</a></div>";
          endwhile;*/
          ?>
          <a href="#" class="btn btn-outline-secondary user-home-left-box-upper-challenge">Interview</a>
          <a href="#" class="btn btn-outline-secondary user-home-left-box-upper-challenge">Interview</a>
          <a href="#" class="btn btn-outline-secondary user-home-left-box-upper-challenge">Interview</a>
        </div>
      </div>
      <div class=" user-home-left-box-bottom">
        <div class="user-home-left-box-bottom-header">
          <h3 title="Scroll down to see more">Upcoming Contests</h3>
        </div>
        <div class="user-home-left-box-bottom-content">
          <?php /*
          while ($row = mysqli_fetch_array($rs_contests)) :
            $item_id = $row['item_id'];
            $name = $row['name'];

            echo "<div class=\"user-all-announcements-content-bottom-links-box\"><a href=\"#\" class=\"btn btn-outline-secondary user-home-left-box-bottom-contest\">Contest $item_id: $name</a></div>";
          endwhile; */
          ?>
          <a href="#" class="btn btn-outline-secondary user-home-left-box-bottom-contest">Contest</a>
          <a href="#" class="btn btn-outline-secondary user-home-left-box-bottom-contest">Contest</a>
        </div>
        <div class="user-home-left-box-bottom-footer">
          <a href="companySponsoredContests.php" class="btn btn-primary user-home-left-box-bottom-button">View Sponsored Contests</a>
        </div>
      </div>
    </div>
    <div class="user-home-right-box">
      <div class="user-home-right-box-header">
        <h3 title="Scroll down to see more">My Announcements</h3>
      </div>
      <div class="user-home-right-box-content">
        <?php /*
        while ($row = mysqli_fetch_array($rs_announcements)) :
          echo
          "<div class=\"user-home-right-box-announcement\">
            <div class=\"user-home-right-box-announcement-detail\">
              <h5>Company Name</h5>
              <a href=\"#\" class=\"user-home-right-box-announcement-detail-link\"><strong>Announcement Title</strong></a>
            </div>
          </div>";
        endwhile; */
        ?>
        <!-- DELETE THESE -->
        <div class="user-home-right-box-announcement">
          <div class="user-home-right-box-announcement-detail">
            <h5>Company Name</h5>
            <a href="#" class="user-home-right-box-announcement-detail-link"><strong>Announcement Title</strong></a>
          </div>
        </div>
        <div class="user-home-right-box-announcement">
          <div class="user-home-right-box-announcement-detail">
            <h5>Company Name</h5>
            <a href="#" class="user-home-right-box-announcement-detail-link"><strong>Announcement Title</strong></a>
          </div>
        </div>
        <div class="user-home-right-box-announcement">
          <div class="user-home-right-box-announcement-detail">
            <h5>Company Name</h5>
            <a href="#" class="user-home-right-box-announcement-detail-link"><strong>Announcement Title</strong></a>
          </div>
        </div>
        <!-- UNTIL HERE -->
      </div>
      <div class="user-home-right-box-footer">
        <a href="createNewAnnouncement.php" class="btn btn-primary">Post New Announcements</a>
      </div>
    </div>
  </div>
</body>

</html>
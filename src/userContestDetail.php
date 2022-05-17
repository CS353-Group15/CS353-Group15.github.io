<?php
include("session.php");

if (isset($_POST['logout'])) {
  session_destroy();
  header("location: userLogin.php");
}

$item_id = $_GET['item_id'];

$rs_contest = $mysqli->query("" .
  "SELECT * " .
  "FROM Contest " .
  "WHERE item_id = $item_id");

$row = mysqli_fetch_array($rs_contest);
$name = $row['name'];
$desc = $row['description'];
$date = $row['date'];
$duration = $row['duration'];
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
    function enroll(enroll, id) {
      if (enrolled) {
        document.getElementById(id).innerHTML =
          "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-bookmarks' viewBox='0 0 16 16'>" +
          "<path d = 'M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z'/>" +
          "<path d = 'M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z'/>" +
          "</svg>";
      } else {
        document.getElementById(id).innerHTML =
          "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-bookmarks-fill' viewBox='0 0 16 16'>" +
          "<path d = 'M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z'/>" +
          "<path d = 'M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z'/>" +
          "</svg>";
      }
    }
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
            <a class="nav-link" href="userAllInvites.php">
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

  <div class="user-announcement-detail">
    <div class="user-announcement-detail-left-box">
      <a href="#" role="button" class="btn btn-primary user-announcement-detail-left-box-button">Back to enrolled contests</a>
      <a href="#" role="button" class="btn btn-success user-announcement-detail-left-box-button">Back to all contests</a>
    </div>
    <div class="user-announcement-detail-right-box">
      <div class="user-announcement-detail-right-box-header">
        <h3><?php echo $item_id . " - " . $name; ?></h3>
        <a href="#" role="button" class="btn btn-outline-danger user-announcement-detail-right-box-header-save">
          <?php
          $enrolled = 1;
          if (!$enrolled) {
            echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"currentColor\" class=\"bi bi-bookmarks\" viewBox=\"0 0 16 16\">
                      <path d=\"M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z\" />
                      <path d=\"M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z\" />
                    </svg>";
          } else {
            echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"currentColor\" class=\"bi bi-bookmarks-fill\" viewBox=\"0 0 16 16\">
                      <path d=\"M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z\"/>
                      <path d=\"M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z\"/>
                    </svg>";
          }
          ?>
        </a>
      </div>
      <div class="user-announcement-detail-right-box-content">
        <p>
          <strong>Date: </strong><?php echo $date; ?>
          <br>
          <strong>Duration: </strong><?php echo $duration; ?>
          <br>
          <?php echo $desc; ?>
        </p>
      </div>
    </div>
    <div class="user-announcement-detail-left-box">
      <a href="#" role="button" class="btn btn-primary user-announcement-detail-left-box-button">Go to the challenges</a>
      <a href="#" role="button" class="btn btn-success user-announcement-detail-left-box-button">Go to the leaderboard</a>
    </div>
  </div>
  <div class="user-announcement-detail-footer">
    <a href="#" class="btn btn-primary">Enroll</a>
  </div>
</body>

</html>
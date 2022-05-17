<?php
include("session.php");

if (isset($_POST['logout'])) {
  session_destroy();
  header("location: userLogin.php");
}

include("config.php");
$username = $_SESSION['username'];
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

  <div class="user-old-submission">
    <div class="user-old-submission-header">
      <style>
        h1 {
          text-align: center;
        }
      </style>
      <h1 class="user-old-submission-header-top" title="Scroll down to see more">
        ID-NAME OF THE CONTEST<br>
        LEADERBOARD
      </h1>
    </div>
    <div class="user-all-announcements-content">
      <div class="user-all-announcements-content-top">
        <button class="btn btn-primary ">Back to the Contest</button>
      </div>
      <div class="user-all-announcements-content-bottom">
        <!-- EXAMPLE -->
        <div class="user-all-announcements-content-bottom-links-box">
          <ol>
            <li>
              <div class="company-leaderboard-li">
                <a href="#" class="btn btn-outline-secondary company-leaderboard-user">USERNAME</a>
                <a href="#" class="btn btn-outline-danger company-leaderboard-message" id="key1">
                  <?php
                  $invited = 1;
                  if (!$invited) {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope\" viewBox=\"0 0 16 16\">
                        <path d=\"M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z\"/>
                    </svg>";
                  } else {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope-fill\" viewBox=\"0 0 16 16\">
                        <path d=\"M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z\"/>
                    </svg>";
                  }
                  ?>
                </a>
              </div>
            </li>
            <li>
              <div class="company-leaderboard-li">
                <a href="#" class="btn btn-outline-secondary company-leaderboard-user">USERNAME</a>
                <a href="#" class="btn btn-outline-danger company-leaderboard-message" id="key1">
                  <?php
                  $invited = 1;
                  if (!$invited) {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope\" viewBox=\"0 0 16 16\">
                        <path d=\"M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z\"/>
                    </svg>";
                  } else {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope-fill\" viewBox=\"0 0 16 16\">
                        <path d=\"M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z\"/>
                    </svg>";
                  }
                  ?>
                </a>
              </div>
            </li>
            <li>
              <div class="company-leaderboard-li">
                <a href="#" class="btn btn-outline-secondary company-leaderboard-user">USERNAME</a>
                <a href="#" class="btn btn-outline-danger company-leaderboard-message" id="key1">
                  <?php
                  $invited = 0;
                  if (!$invited) {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope\" viewBox=\"0 0 16 16\">
                        <path d=\"M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z\"/>
                    </svg>";
                  } else {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope-fill\" viewBox=\"0 0 16 16\">
                        <path d=\"M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z\"/>
                    </svg>";
                  }
                  ?>
                </a>
              </div>
            </li>
            <li>
              <div class="company-leaderboard-li">
                <a href="#" class="btn btn-outline-secondary company-leaderboard-user">USERNAME</a>
                <a href="#" class="btn btn-outline-danger company-leaderboard-message" id="key1">
                  <?php
                  $invited = 0;
                  if (!$invited) {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope\" viewBox=\"0 0 16 16\">
                        <path d=\"M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z\"/>
                    </svg>";
                  } else {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope-fill\" viewBox=\"0 0 16 16\">
                        <path d=\"M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z\"/>
                    </svg>";
                  }
                  ?>
                </a>
              </div>
            </li>
            <li>
              <div class="company-leaderboard-li">
                <a href="#" class="btn btn-outline-secondary company-leaderboard-user">USERNAME</a>
                <a href="#" class="btn btn-outline-danger company-leaderboard-message" id="key1">
                  <?php
                  $invited = 1;
                  if (!$invited) {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope\" viewBox=\"0 0 16 16\">
                        <path d=\"M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z\"/>
                    </svg>";
                  } else {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope-fill\" viewBox=\"0 0 16 16\">
                        <path d=\"M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z\"/>
                    </svg>";
                  }
                  ?>
                </a>
              </div>
            </li>
            <li>
              <div class="company-leaderboard-li">
                <a href="#" class="btn btn-outline-secondary company-leaderboard-user">USERNAME</a>
                <a href="#" class="btn btn-outline-danger company-leaderboard-message" id="key1">
                  <?php
                  $invited = 0;
                  if (!$invited) {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope\" viewBox=\"0 0 16 16\">
                        <path d=\"M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z\"/>
                    </svg>";
                  } else {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope-fill\" viewBox=\"0 0 16 16\">
                        <path d=\"M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z\"/>
                    </svg>";
                  }
                  ?>
                </a>
              </div>
            </li>
            <li>
              <div class="company-leaderboard-li">
                <a href="#" class="btn btn-outline-secondary company-leaderboard-user">USERNAME</a>
                <a href="#" class="btn btn-outline-danger company-leaderboard-message" id="key1">
                  <?php
                  $invited = 1;
                  if (!$invited) {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope\" viewBox=\"0 0 16 16\">
                        <path d=\"M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z\"/>
                    </svg>";
                  } else {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope-fill\" viewBox=\"0 0 16 16\">
                        <path d=\"M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z\"/>
                    </svg>";
                  }
                  ?>
                </a>
              </div>
            </li>
            <li>
              <div class="company-leaderboard-li">
                <a href="#" class="btn btn-outline-secondary company-leaderboard-user">USERNAME</a>
                <a href="#" class="btn btn-outline-danger company-leaderboard-message" id="key1">
                  <?php
                  $invited = 1;
                  if (!$invited) {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope\" viewBox=\"0 0 16 16\">
                        <path d=\"M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z\"/>
                    </svg>";
                  } else {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope-fill\" viewBox=\"0 0 16 16\">
                        <path d=\"M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z\"/>
                    </svg>";
                  }
                  ?>
                </a>
              </div>
            </li>
            <li>
              <div class="company-leaderboard-li">
                <a href="#" class="btn btn-outline-secondary company-leaderboard-user">USERNAME</a>
                <a href="#" class="btn btn-outline-danger company-leaderboard-message" id="key1">
                  <?php
                  $invited = 0;
                  if (!$invited) {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope\" viewBox=\"0 0 16 16\">
                        <path d=\"M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z\"/>
                    </svg>";
                  } else {
                    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-envelope-fill\" viewBox=\"0 0 16 16\">
                        <path d=\"M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z\"/>
                    </svg>";
                  }
                  ?>
                </a>
              </div>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  </div>


</body>

</html>
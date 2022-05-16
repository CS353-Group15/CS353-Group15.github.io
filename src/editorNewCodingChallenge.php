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
    //var categories = [];
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
            <div class="editor-new-coding-challenge-add-category-added">

            </div>
            <div>
              <button class="btn btn-primary" id="addCategoryBtn">Add Category</button>
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
            </div>

            <script type="text/javascript">
              var modal_background = document.getElementById("challengeFilterBackground");
              var btn = document.getElementById("addCategoryBtn");
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
          </div>
        </div>
        <div class="editor-new-coding-challenge-language">
          <div class="editor-new-coding-challenge-add-category">

          </div>
        </div>
      </div>
      <div class="editor-new-coding-challenge-content-right">
        <div class="editor-new-coding-challenge-content-right-top">
          <textarea name="new-coding-challenge-solution" id="new-coding-challenge-solution" placeholder="Solution..." class="form-control new-coding-challenge-solution"></textarea>
        </div>
        <div class="editor-new-coding-challenge-content-right-middle">
          <div class="editor-new-coding-challenge-content-right-test-cases">
            <div class="editor-new-coding-challenge-content-right-test-cases-header">
              <h5>Testcases</h5>
            </div>
            <div class="editor-new-coding-challenge-content-right-test-cases-info-box">
              <!-- Example -->
              <div class="editor-new-coding-challenge-content-right-test-cases-info">
                <p style="margin-bottom: 0">
                  <strong>ID:</strong> 123456
                  <br>
                  <strong>Input:</strong> 123
                  <br>
                  <strong>Expected Output:</strong> 456
                </p>
              </div>
              <div class="editor-new-coding-challenge-content-right-test-cases-info">
                <p style="margin-bottom: 0">
                  <strong>ID:</strong> 123456
                  <br>
                  <strong>Input:</strong> 123
                  <br>
                  <strong>Expected Output:</strong> 456
                </p>
              </div>
              <div class="editor-new-coding-challenge-content-right-test-cases-info">
                <p style="margin-bottom: 0">
                  <strong>ID:</strong> 123456
                  <br>
                  <strong>Input:</strong> 123
                  <br>
                  <strong>Expected Output:</strong> 456
                </p>
              </div>
              <div class="editor-new-coding-challenge-content-right-test-cases-info">
                <p style="margin-bottom: 0">
                  <strong>ID:</strong> 123456
                  <br>
                  <strong>Input:</strong> 123
                  <br>
                  <strong>Expected Output:</strong> 456
                </p>
              </div>
              <!-- Example -->
            </div>
          </div>
          <div class="editor-new-coding-challenge-content-right-test-cases-bottom">
            <div class="editor-new-coding-challenge-content-right-test-cases-bottom-inputs">
              <textarea name="test-case-input" id="test-case-input" class="form-control editor-new-coding-challenge-content-right-test-cases-bottom-input" placeholder="Input"></textarea>
              <textarea name="test-case-output" id="test-case-output" class="form-control editor-new-coding-challenge-content-right-test-cases-bottom-output" placeholder="Output"></textarea>
            </div>
            <a href="#" class="btn btn-success" role="button" style="margin-top:16px">Add New Testcase</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="editor-new-coding-challenge-submit">
    <a href="#" class="btn btn-primary">Submit</a>
  </div>

</body>

</html>
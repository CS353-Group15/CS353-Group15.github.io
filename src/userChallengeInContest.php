<?php
include("session.php");

if (isset($_POST['logout'])) {
  session_destroy();
  header("location: userLogin.php");
}
include("config.php");
$username = $_SESSION['username'];
$contest_id = $_GET['contest_id'];
$question_number = $_GET['question_number'];
$next_question = $question_number + 1;
$previous_question = $question_number - 1;

$rs_next = $mysqli->query("SELECT max(question_number) as max_number FROM has_challenge WHERE contest_id = $contest_id");
$row_next = mysqli_fetch_array($rs_next);
$max_number = $row_next['max_number'];

$rs_challenge = $mysqli->query("" .
  "SELECT * " .
  "FROM Challenge " .
  "WHERE item_id IN (SELECT challenge_id FROM has_challenge WHERE contest_id = '$contest_id' AND question_number = '$question_number')");

$row = mysqli_fetch_array($rs_challenge);
$challenge_id = $row['item_id'];
$description = $row['problem_statement'];
$difficulty = $row['difficulty'];

$rs_category =
  $mysqli->query("" .
    "SELECT category_name " .
    "FROM Category " .
    "WHERE category_name IN ( " .
    "SELECT category_name " .
    "FROM has_category " .
    "WHERE challenge_id = $challenge_id)");

$rs_language =
  $mysqli->query("" .
    "SELECT language_name " .
    "FROM ProgrammingLanguage " .
    "WHERE language_name IN ( " .
    "SELECT language_name " .
    "FROM has_language " .
    "WHERE challenge_id = $challenge_id)");

if (isset($_POST['submit'])) {
  $mm = mysqli_fetch_array($mysqli->query("SELECT max(submission_id) as m FROM Submission "));
  $s_id = $mm['m'] + 1;
  $code = $_POST['challenge-code'];
  $today_date = date("Y-m-d");
  $score = rand(1, 10);
  $check = $mysqli->query("INSERT INTO Submission(submission_id, content, date, score, programming_lang) VALUES " .
    "('$s_id', '$code', '$today_date', $score, 'java')");
  if ($check) {
    $check2 = $mysqli->query("INSERT INTO has_submission(challenge_id, submission_id) VALUES ( '$challenge_id', '$s_id')");
  }

  if ($check && $check2) {
    echo "<script>alert('Submission Successful!')</script>";
  } else {
    echo "<script>alert('Submission Failed!')</script>";
  }
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


  <?php
  if ($max_number > $next_question) {
    echo "<form action=\"userChallengeInContest.php?contest_id=$contest_id&question_number=$next_question\" method=\"POST\">";
  } else {
    echo "<form action=\"userHomePage.php\" method=\"POST\">";
  }
  ?>
  <div class="challenge-body">
    <div class="challenge-header">
      <a href="#" class="btn btn-danger">Remaining Time: ...</a>
      <div class="challenge-top">
        <?php echo $challenge_id . " - Question Number 1"; ?>
      </div>
      <a href="#" class="btn btn-success">View Previous Submissions</a>
    </div>
    <div class="challenge-body-content">
      <div class="challenge-left">
        <p>
          <strong>Diffuculty:</strong><?php echo $difficulty; ?>
          <br>
          <strong>Language:</strong>
          <?php
          while ($language_row = mysqli_fetch_array($rs_language)) :
            echo $language_row['language_name'] . " ";
          endwhile;
          ?>
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
          echo $description;
          ?>
        </p>
      </div>
      <div class="challenge-right">
        <select class="form-select language-selector" aria-label="Select Language">
          <option selected>Choose Language</option>
          <?php
          mysqli_data_seek($rs_language, 0);
          while ($language_row = mysqli_fetch_array($rs_language)) :
            echo "<option>" . $language_row['language_name'] . "</option>";
          endwhile;
          ?>
        </select>
        <textarea name="challenge-code" id="challenge-code" class="challenge-code" placeholder="// Code Here"></textarea>
      </div>

    </div>
    <div class="user-challenge-in-contest-footer">
      <?php
      if ($previous_question == 0) {
        echo "<a href=\"userChallengeInContest.php?contest_id=$contest_id&question_number=$previous_question\" class=\"btn btn-primary invisible\">Previous</a>";
      } else {
        echo "<a href=\"userChallengeInContest.php?contest_id=$contest_id&question_number=$previous_question\" class=\"btn btn-primary\">Next</a>";
      }
      ?>
      <button type="submit" class="btn btn-primary">Next/Submit</button>
    </div>
  </div>
  </form>


</body>

</html>
<?php 
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

  <div class="new-invite-content">
    <div class="new-invite-content-header">
      <h3>Create New Contest</h3>
    </div>
    <div class="new-invite-content-body">
      <div class="form-floating new-invite-content-title" style="width: 50%; padding: 3px;">
        <textarea class="form-control" placeholder="Title" id="floatingTextarea" style="resize:none"></textarea>
        <label for="floatingTextarea">Name</label>
      </div>
      <div class="form-floating new-invite-content-title" style="width: 25%; padding: 3px">
        <input class="form-control" placeholder="Earliest date" id="floatingTextarea" style="resize:none" type="date"></textarea>
        <label for="floatingTextarea">Date</label>
      </div>
      <div class="form-floating new-invite-content-title" style="width: 50%; padding: 3px;">
        <textarea class="form-control" placeholder="Duration" id="floatingTextarea" style="resize:none" type="number"></textarea>
        <label for="floatingTextarea">Duration (mins)</label>
      </div>
    </div>
    <div class="new-invite-content-body">
      <div class="form-floating new-invite-content-title" style="width: 100%; padding: 3px; min-height: 124px">
        <textarea class="form-control" placeholder="Content" id="floatingTextarea" style="resize:none; height: 100%"></textarea>
        <label for="floatingTextarea">Content</label>
      </div>
    </div>
    <div class="new-invite-content-body">
      <div class="user-all-announcements-content" style="margin-top: 8px">
        <div class="company-all-announcements-content">
          <h4>CHALLENGES</h4>
          <!-- EXAMPLE -->
          <div class="user-all-announcements-content-bottom-links-box">
            <a href="#" class="btn btn-outline-secondary btn-lg company-all-announcements-content-bottom-links">ID-NAME OF THE CHALLENGE</a>
          </div>
          <div class="user-all-announcements-content-bottom-links-box">
            <a href="#" class="btn btn-outline-secondary btn-lg company-all-announcements-content-bottom-links">ID-NAME OF THE CHALLENGE</a>
          </div>
          <div class="user-all-announcements-content-bottom-links-box">
            <a href="#" class="btn btn-outline-secondary btn-lg company-all-announcements-content-bottom-links">ID-NAME OF THE CHALLENGE</a>
          </div>
          <div class="user-all-announcements-content-bottom-links-box">
            <a href="#" class="btn btn-outline-secondary btn-lg company-all-announcements-content-bottom-links">ID-NAME OF THE CHALLENGE</a>
          </div>
          <div class="user-all-announcements-content-bottom-links-box">
            <a href="#" class="btn btn-outline-secondary btn-lg company-all-announcements-content-bottom-links">ID-NAME OF THE CHALLENGE</a>
          </div>
          <div class="user-all-announcements-content-bottom-links-box">
            <a href="#" class="btn btn-outline-secondary btn-lg company-all-announcements-content-bottom-links">ID-NAME OF THE CHALLENGE</a>
          </div>
          <div class="user-all-announcements-content-bottom-links-box">
            <a href="#" class="btn btn-outline-secondary btn-lg company-all-announcements-content-bottom-links">ID-NAME OF THE CHALLENGE</a>
          </div>
        </div>
      </div>
    </div>
    <div class="new-invite-content-footer">
      <a href="#" class="btn btn-primary" style="margin-right: 4px">Add new challenge</a>
      <a href="#" class="btn btn-primary">Send</a>
    </div>
    <div class="new-invite-content-footer">

    </div>
  </div>
</body>

</html>
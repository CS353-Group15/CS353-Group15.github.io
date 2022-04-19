<?php ?>
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
            <a class="btn btn-outline-info btn-large" href="userLogin.php">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="user-home-content">
    <div class="user-home-left-box">
      <div class="user-home-left-box-upper">
        <div class="user-home-left-box-upper-header">
          <button class="btn btn-primary">Filter</button>
          <h3>Challenges</h3>
          <button class="btn btn-danger">Random Challenge With Filters</button>
        </div>
        <div class="user-home-left-box-upper-content">
          <a href="#" class="btn btn-outline-secondary user-home-left-box-upper-challenge">Challenge 1</a>
          <a href="#" class="btn btn-outline-secondary user-home-left-box-upper-challenge">Challenge 2</a>
          <a href="#" class="btn btn-outline-secondary user-home-left-box-upper-challenge">Challenge 3</a>
          <a href="#" class="btn btn-outline-secondary user-home-left-box-upper-challenge">Challenge 3</a>
        </div>
      </div>
      <div class=" user-home-left-box-bottom">
        <div class="user-home-left-box-bottom-header">
          <h3>Upcoming Contests</h3>
        </div>
        <div class="user-home-left-box-bottom-content">
          <a href="#" class="btn btn-outline-secondary user-home-left-box-bottom-contest">Contest 1</a>
          <a href="#" class="btn btn-outline-secondary user-home-left-box-bottom-contest">Contest 2</a>
        </div>
        <div class="user-home-left-box-bottom-footer">
          <a href="#" class="btn btn-primary user-home-left-box-bottom-button">View Enrolled Contests</a>
        </div>
      </div>
    </div>
    <div class="user-home-right-box">
      <div class="user-home-right-box-header">
        <h3>Announcements</h3>
      </div>
      <div class="user-home-right-box-content">
        <div class="user-home-right-box-announcement">
          <div class="user-home-right-box-announcement-save">
            <a href="#" class="user-home-right-box-announcement-save-button">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
              </svg>
            </a>
          </div>
          <div class="user-home-right-box-announcement-detail">
            <h5>Company Name</h5>
            <a href="#" class="user-home-right-box-announcement-detail-link"><strong>Announcement Title</strong></a>
          </div>
        </div>
        <div class="user-home-right-box-announcement">
          <div class="user-home-right-box-announcement-save">
            <a href="#" class="user-home-right-box-announcement-save-button">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
              </svg>
            </a>
          </div>
          <div class="user-home-right-box-announcement-detail">
            <h5>Company Name</h5>
            <a href="#" class="user-home-right-box-announcement-detail-link"><strong>Announcement Title</strong></a>
          </div>
        </div>
        <div class="user-home-right-box-announcement">
          <div class="user-home-right-box-announcement-save">
            <a href="#" class="user-home-right-box-announcement-save-button">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
              </svg>
            </a>
          </div>
          <div class="user-home-right-box-announcement-detail">
            <h5>Company Name</h5>
            <a href="#" class="user-home-right-box-announcement-detail-link"><strong>Announcement Title</strong></a>
          </div>
        </div>
      </div>
      <div class="user-home-right-box-footer">
        <a href="" class="btn btn-primary">View Saved Announcements</a>
      </div>
    </div>
  </div>
</body>

</html>
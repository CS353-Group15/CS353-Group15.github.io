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
    function sponsor(sponsor, id) {
      if (sponsored) {
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
      <a href="#" role="button" class="btn btn-primary user-announcement-detail-left-box-button">Back to sponsored contests</a>
      <a href="#" role="button" class="btn btn-success user-announcement-detail-left-box-button">Back to all contests</a>
    </div>
    <div class="user-announcement-detail-right-box">
      <div class="user-announcement-detail-right-box-header">
        <h3>ID - NAME OF THE CONTEST</h3>
        <a href="#" role="button" class="btn btn-outline-danger user-announcement-detail-right-box-header-save">
          <?php
          $sponsored = 1;
          if (!$sponsored) {
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
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae nulla consequuntur reprehenderit culpa a soluta dolorem saepe incidunt dicta reiciendis omnis maxime, deserunt obcaecati qui maiores amet? Voluptatum deleniti optio sed ut dolore, voluptas illo odit iste quasi voluptatem, porro laborum aut veritatis earum ullam nobis accusantium natus asperiores dolorem ducimus quas mollitia! Ad sed ullam, obcaecati fuga adipisci aliquid id nam pariatur, molestias, voluptate saepe natus? Itaque ipsa aliquid a nam omnis illum sed aspernatur minima laudantium quisquam repellat cum perferendis, non, natus hic earum voluptas quod tempora! Autem, cum aliquid? Ab ducimus quibusdam vero facilis cum atque dolores dolorem et iure quia odit debitis, animi sint. Obcaecati, debitis, voluptatibus officiis architecto hic facilis nesciunt perspiciatis dolore esse quod ea maxime. Nobis dolor in cumque similique dolorum possimus nemo omnis error vel veritatis, tenetur explicabo neque doloremque a autem ut. Ad, quis facilis illum ea aut in alias aliquid, enim consequuntur assumenda quo dolorum, consectetur libero reprehenderit error at quidem eos hic saepe delectus. Dolor tempore, quasi atque, vero rem recusandae mollitia ab assumenda esse similique illo eveniet et modi aperiam doloribus nesciunt, expedita quam. Adipisci in neque blanditiis cum hic quia nihil architecto molestias minus corrupti ratione, laudantium facilis perferendis magnam nemo assumenda maiores esse inventore ducimus, a fugit repudiandae eos modi ea. Quod facilis repellendus ipsa, quibusdam a dolores quas cumque nisi. Explicabo praesentium voluptates natus laborum corporis officia non nostrum commodi, at veritatis? Expedita aliquam quas labore vitae consequuntur, facere sapiente porro? Quasi libero voluptatum aut nostrum id incidunt officia reprehenderit magnam aperiam. Laboriosam voluptate rerum harum, incidunt amet illo aspernatur officia! Placeat numquam maiores eaque accusamus. Sequi eius, maiores aspernatur illo odio praesentium molestias minima quasi rerum reprehenderit sint sed, aliquid culpa, esse animi. Enim veniam dolore, qui error quibusdam facilis dignissimos doloremque iste eligendi vel officiis nemo expedita fugit itaque alias optio hic asperiores autem. Explicabo, magni beatae? Quaerat ducimus molestias nostrum suscipit doloribus explicabo deserunt velit officia expedita laborum unde a amet similique at sunt ratione necessitatibus, maxime placeat molestiae magni, reiciendis reprehenderit commodi. Eligendi ut et adipisci, asperiores ex atque maxime reprehenderit exercitationem quisquam nulla obcaecati labore modi autem. Quo, tempore perspiciatis et doloremque magnam cupiditate illo quidem quia, laboriosam possimus voluptatibus dolores nulla est doloribus fuga nihil, debitis vitae facere vero quasi. Eius, porro nobis. Iste repellendus odio pariatur! Culpa error corporis ratione eius modi atque qui, exercitationem, nam aliquid blanditiis, numquam nihil iusto pariatur veniam ad sequi. Eveniet suscipit optio ipsa facere, consectetur quam dolorum voluptates hic numquam sapiente dolor dicta a! Similique dolores ut itaque iste, neque magnam autem velit optio sapiente ipsam ipsum quisquam natus impedit nobis quod asperiores. Facere corrupti eos, omnis amet incidunt nostrum magni fuga deserunt possimus soluta tenetur vero architecto vel necessitatibus accusamus voluptate autem esse dignissimos nemo, molestias voluptatibus excepturi tempora modi voluptatum. Aliquam quod, beatae aspernatur numquam quam nobis facere commodi assumenda reprehenderit cum deleniti ducimus nesciunt. Doloribus recusandae voluptatum quos eius minus quod, magnam aperiam eveniet expedita molestias id mollitia nisi.
        </p>
      </div>
    </div>
    <div class="user-announcement-detail-rightest-box">
      <a href="#" role="button" class="btn btn-success user-announcement-detail-left-box-button">Go to the leaderboard</a>
    </div>
  </div>
</body>

</html>
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
    function loginHandler() {
      var username = document.getElementById("login").elements[0].value;
      var password = document.getElementById("login").elements[1].value;
      var name = document.getElementById("login").elements[2].value;

      if (username == "" || password == "" || name == "")
        alert("Please enter your username, password or name!");
    }
  </script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <div class="navbar-brand">BilkentCodes</div>
      <form action="about.php" method="POST" class="d-flex">
        <button class="btn btn-info btn-large">About</button>
      </form>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="main-box">
      <div class="left-box">
        <div class="left-box-header">
          <h2>Great to meet you! If you are a user, register here.</h2>
        </div>

        <form action="register.php" method="POST" id="login">
          <div class="forms">
            <input type="text" class="data-box" placeholder="Username">
            <input type="text" class="data-box" placeholder="Name">
            <input type="password" class="data-box" placeholder="Password">
            <div class="button-box">
              <button class="btn btn-primary btn-large login" type="submit" onclick="loginHandler()">Register</button>
            </div>
          </div>
        </form>
        <div class="left-footer">
          <p>If you already have an account, you can login from <strong><a href="userLogin.php">login</a></strong>.</p>
        </div>
      </div>
      <div class="right-box">
        <form action="companyRegister.php">
          <button class="btn btn-primary btn-large change-company">Register As A Company</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
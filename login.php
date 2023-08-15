<?php
if (!isset($_SESSION)) {
  session_start();
}

include_once("Connections/connections.php");

$con = connection();


if (isset($_POST['login'])) {

  $userName = $_POST['username'];
  $passWord = $_POST['password'];


  $sql = "SELECT * FROM `student_users` WHERE username = '$userName' AND password = '$passWord' ";

  $user = $con->query($sql) or die($con->error);

  $row = $user->fetch_assoc();

  $total = $user->num_rows;

  if ($total > 0) {
    $_SESSION['userLogin'] = $row['username'];
    $_SESSION['access'] = $row['access'];

    echo header("Location: index.php");

  } else {
    echo "<div class='message warning'>  No user found </div>";
  }


}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">
  <title>Student Management System</title>
</head>

<body id="form-login">

  <div class="login-container">
    <!-- <h1>Login Page</h1> -->

    <div class="form-logo">
      <img src="IMG/user-login-icon-14.png" alt="">
    </div>



    <form action="" method="post">


      <div class="form-element">
        <label for="">Username</label>
        <input type="text" name="username" id="username" autocomplete="off" placeholder="Enter Username" required>
      </div>

      <div class="form-element">
        <label for="">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter Password" required>
      </div>


      <button type="submit" name="login">Login</button>
    </form>
  </div>

  <footer></footer>

  <script src="https://kit.fontawesome.com/2cbba3f514.js" crossorigin="anonymous"></script>
</body>

</html>
<?php


if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION['access']) && $_SESSION['access'] == 'admin') {
  echo "<div class='message success'> Welcome " . $_SESSION['userLogin'] . '</div>';
} else {
  echo header("Location: index.php");
}


include_once("Connections/connections.php");

$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM `student_list` WHERE id = '$id' ";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();



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

<body>



  <main class="details-wrapper">


    <form action="delete.php" method="post">

      <div class="button-container">
        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
        <a href="index.php">Back</a>

        <?php if ($_SESSION['access'] == 'admin') { ?>
          <button type="submit" name="delete" class="button-danger">Delete</button>
        <?php } ?>
      </div>



      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    </form>

    <h2>
      <?php echo $row['firstname']; ?>
      <?php echo $row['lastname']; ?>
    </h2>

    <h6> is a
      <?php echo $row['gender']; ?>
    </h6>
    <?php echo $row['birthday'] ?>





  </main>

  <footer></footer>

  <script src="https://kit.fontawesome.com/2cbba3f514.js" crossorigin="anonymous"></script>
</body>

</html>
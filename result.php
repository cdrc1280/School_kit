<?php


if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION['userLogin'])) {
  echo "<div class='message success'> Welcome " . $_SESSION['userLogin'] . '</div>';
} else {
  echo "<div class='message info'> Welcome Guest </div>";
}


include_once("Connections/connections.php");

$con = connection();

$search = $_GET['search'];
$sql = "SELECT * FROM `student_list` WHERE `firstname` LIKE '%$search%' || `lastname` LIKE '%$search%' ORDER BY id DESC";
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

  <main class="wrapper">

    <h1>Student Management System</h1>
    <header>

      <div class="search-container">
        <form action="result.php">
          <input type="text" name="search" id="search" class="search-input">
          <button type="submit" class="search-btn">Search</button>
        </form>
      </div>

      <div class="button-container">
        <?php if (isset($_SESSION['userLogin'])) { ?>
          <a href="logout.php">Logout</a>
        <?php } else { ?>
          <a href="login.php">Login</a>
        <?php } ?>

        <a href="add.php" class="add-btn">Add new?</a>
      </div>

    </header>

    <table>
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th></th>
          <!-- <th>Gender</th>
                <th>Birthday</th> -->
          <!-- <th>added at</th> -->
        </tr>
      </thead>


      <tbody>
        <?php do { ?>
          <tr>
            <td>
              <?php echo $row['firstname']; ?>
            </td>
            <td>
              <?php echo $row['lastname']; ?>
            </td>
            <!-- <td>
                            <?php echo $row['gender']; ?>
                        </td> -->
            <!-- <td>
                            <?php echo $row['birthday']; ?>
                        </td> -->
            <!-- <td> <?php echo $row['added_at']; ?></td> -->

            <?php if (isset($_SESSION['userLogin'])) { ?>
              <td><a href="details.php?id=<?php echo $row['id']; ?>" class="button-small">View Details</a></td>
            <?php } ?>
          </tr>
        <?php } while ($row = $students->fetch_assoc()); ?>
      </tbody>

      <tfoot></tfoot>

    </table>

    <footer></footer>
  </main>

  <script src="https://kit.fontawesome.com/2cbba3f514.js" crossorigin="anonymous"></script>
</body>

</html>
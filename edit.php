<?php

include_once('Connections/connections.php');

$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM `student_list` WHERE id = '$id' ";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

if (isset($_POST['submit'])) {

  $firstName = $_POST['firstname'];
  $lastName = $_POST['lastname'];
  $gender = $_POST['gender'];
  $birthday = $_POST['birthday'];


  $sql = "UPDATE `student_list` SET `firstname`='$firstName',`lastname`='$lastName',`gender`='$gender', `birthday` = '$birthday' WHERE `id` = '$id'";

  $con->query($sql) or die($con->error);

  echo header('Location: details.php?id=' . $id);
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <link rel='stylesheet' href='CSS/main.css'>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'
    integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
  <link rel='preconnect' href='https://fonts.googleapis.com'>
  <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
  <link href='https://fonts.googleapis.com/css2?family=Titan+One&display=swap' rel='stylesheet'>
  <title>Student Management System</title>
</head>

<body>

  <main class="edit-container">
    <h1>Edit information</h1>

    <form action='' method='post'>

      <div class='form-row'>
        <div class='input-data'>
          <label>First Name</label>
          <input type='text' name='firstname' id='firstname' value="<?php echo $row['firstname']; ?>">
        </div>
      </div>

      <label>Last Name</label>
      <input type='text' name='lastname' id='lastname' value="<?php echo $row['lastname']; ?>">

      <br>

      <label>Gender</label>
      <select name='gender' id='gender'>
        <option value='Male' <?php echo ($row['gender'] === 'Male') ? 'selected' : '' ?>>Male</option>
        <option value='Female' <?php echo ($row['gender'] === 'Female') ? 'selected' : '' ?>>Female</option>
      </select>


      <br>
      <label>Birthday</label>
      <input type='date' name='birthday' value="<?php echo $row['birthday'] ?>">
      <br>

      <input type='submit' name='submit' value='Update Information'>

    </form>
  </main>

</body>

</html>
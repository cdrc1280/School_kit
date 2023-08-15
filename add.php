<?php

include_once('Connections/connections.php');

$con = connection();

if (isset($_POST['submit'])) {

    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];

    $sql = "INSERT INTO `student_list`( `firstname`, `lastname`, `gender`,`birthday`)
    VALUES ('$first_name','$last_name','$gender', '$birthday')";

    $con->query($sql) or die($con->error);

    echo header('Location: index.php');
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

    <main class="add-container">
        <h1>Add new?</h1>

        <form action='' method='post'>

            <div class='form-row'>
                <div class='input-data'>
                    <label>First Name</label>
                    <input type='text' name='firstname' id='firstname' placeholder="Enter your First Name" required>
                </div>
            </div>

            <label>Last Name</label>
            <input type='text' name='lastname' id='lastname' placeholder="Enter your Last Name" required>

            <br>

            <label>Gender</label>
            <select name='gender' id='gender' required>
                <option value="">--Select Gender--</option>
                <option value='Male'>Male</option>
                <option value='Female'>Female</option>
            </select>

            <br>

            <label>Birthday</label>
            <input type='date' name='birthday' id=''>

            <br>

            <input type='submit' name='submit' value='Submit Form' class>

        </form>
    </main>

</body>

</html>
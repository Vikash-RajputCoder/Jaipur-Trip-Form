<?php
$insert = false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "jaipur_trip";
    // Database Connection
    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $decs = mysqli_real_escape_string($con, $_POST['decs']);

    $sql = "INSERT INTO `trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`) 
        VALUES ('$name', '$age', '$gender', '$email', '$phone', '$decs', current_timestamp());";

    if ($con->query($sql) === TRUE) {
        $insert = true;
    } else {
        echo "ERROR: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="Bgg.jpg" alt="Agra College">
    <div class="container">
        <h1>Welcome To Agra College, Jaipur Trip</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thank you for submitting your form. We are happy to see you joining us for the jaipur trip.</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="tel" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="decs" id="decs" cols="30" rows="10" placeholder="Enter your any other information"></textarea>
            <button class="btn" type="Submit">Submit</button>
        </form>
    </div>
</body>
</html>

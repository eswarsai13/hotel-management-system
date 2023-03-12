<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect( $server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $profile = $_POST['profile'];
    $year = $_POST['year'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $descript = $_POST['descript'];
    $sql = "INSERT INTO `hello`.`hackerearth` (`name`, `year`, `profile`, `email`, `phone`, `descript`, `dt`) VALUES ('$name', '$year', '$profile', '$email', '$phone', '$descript', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student council</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    
    <div class="container">
        <h1>Hacker Earth</h3>
        <form action="hackerearth.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="year" id="year" placeholder="Enter your Age">
            <input type="text" name="profile" id="profile" placeholder="Enter profile link">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="descript" id="descript" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>

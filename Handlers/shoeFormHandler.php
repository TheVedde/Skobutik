<?php
include '../Includes/db_connect.php';
$mysql = db_connect();

$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$shoeSize = $_POST['shoesize'];

$emailCheck = "Select Skobutik_contributers.email
FROM Skobutik_contributers
WHERE Skobutik_contributers.email = '$email'";

$result = $mysql->query($emailCheck);

if($result->num_rows == 0) {
    
$query = "INSERT INTO Skobutik_contributers (name, age, email, shoeSize)
VALUES ("."'$name'".", ".$age.", " . "'$email'" .", ".$shoeSize.");";

$result = $mysql->query($query);
$status = 1;
    
header("location: ../Pages/index.php?status=$status");
}

else {
    
$status = 3;
    
header("location: ../Pages/index.php?status=$status");    
}


<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "form";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO sign_up (Name, Phone, Email,Password)
VALUES ('$_POST[name]','$_POST[phone]','$_POST[email]','$_POST[password]')";

if ($conn->query($sql) === TRUE) {
    $message = "New record created successfully...Log in and Enjoy :)";
	echo "<script type='text/javascript'>alert('$message');window.location.href='mainpage.php';</script>";
}
$check="SELECT COUNT(*) FROM sign_up WHERE Email = '$_POST[email]'";
if (mysqli_query($conn,$check))
{
    $alert_message = "E-Mail Already Exists";
	echo "<script type='text/javascript'>alert('$alert_message');window.location.href='mainpage.php';</script>"; 
	
}
else {

    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
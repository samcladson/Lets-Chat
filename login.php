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
if(isset($_POST["email"], $_POST["password"])) 
        {     

            $email = $_POST["email"]; 
            $password = $_POST["password"]; 

            $result = mysqli_query($conn,"SELECT Email, Password FROM sign_up WHERE Email = '".$email."' && Password = '".$password."'");

			if ($result && mysqli_num_rows($result) > 0) {
			    header("location:index.php");
			} else {
			    $alert_message = "Inalied E-Mail or password";
				echo "<script type='text/javascript'>alert('$alert_message');window.location.href='mainpage.php';</script>";
			}
    } 
?>
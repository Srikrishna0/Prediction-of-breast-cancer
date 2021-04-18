<?php
    session_start();	//Starting session here.
    extract($_REQUEST); // Extracting the Request.
    include("dbconfig.php");
   
    $sql = "SELECT * FROM `register` where `register_email` ='$email' and `register_password`='$pwd'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    
   
   if(is_array($row)) {
        // setting the session variables.
        $_SESSION['start_time'] = time();
        $_SESSION["aid"] = $row['register_id'];
        $_SESSION["username"] = $row['register_fullname'];
        $_SESSION["email"] = $row['register_email'];
    } 
    else 
	{
        //echo "Error: " . $sql . "<br>" . $con->error;
	  echo "<script>window.location.assign('login.html?login=error')</script>"; 
        

    }

	// If session is set and user credentials are correct then it redirects to dashboard.
    if(isset($_SESSION["email"])) {
		echo "<script>window.location.assign('dashboard.php')</script>"; 
    }
 ?>
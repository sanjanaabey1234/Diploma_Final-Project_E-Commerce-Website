<?php

//including the database connection file
include_once("connection.php");

//check if form submitted,insert user data into database
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$password = $_POST['pass'];
	$cpassword = $_POST['cpass'];
	
	//if email already exists, throw error
	$email_result = mysqli_query($mysqli, "select 'email' from useradmin where email = '$email'");
	
	//count the number of row matched
	$user_matched = mysqli_num_rows($email_result);
	
	//if number of user rows returned more than 0,it means email already exists
	if($user_matched > 0)
	{
		echo"<br/><br/><strong>Error:</strong> <h1>user already exists with the email id '$email'.</h1>";
	}
	else if($password!=$cpassword)
	{
	//alert ekak widiyTA denna oona
	 
	    echo "<script>alert('please check password')</script>";
	
	}
	else
	{
		//insert user data into database
		$result = mysqli_query($mysqli, "INSERT INTO useradmin(name,email,number,password) VALUES ('$name','$email','$number','$password')");
		
		//check if user data inserted successfully.
		if($result)
		{
			
			echo "<script>alert('User Registered Successfully.')</script>";
			echo "<script>header('location:login.html');</script>";
			
			/*echo "<script>alert('User Registered Successfully.')</script>";
			if(alert)
			{
			header("location:login.html");
			}*/
		}
		else
		{
			echo "Registration Error.Please Try Again." . mysqli_error($mysqli);
		}
		
	}
}
?>

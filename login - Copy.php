<?php

include_once("connection.php");

if(isset($_POST["submit"]))
{
	$email=$_POST["email"];
	$password=$_POST["pass"];
	
	//check if a user exists with given username & password
	
$result=mysqli_query($mysqli,"select 'email','password' from useradmin 
where email='$email'and password='$password'");

//count the no of user/rows returned by query
$user_matched=mysqli_num_rows($result);

//check if user matched/exist,store user email in session and redirect to sample page-1
if($user_matched >0)
{

	if($email=="admin123@gmail.com" && $password=="12345")
	{
		header("location:http://localhost/admin.php");
		
	}
	else
	{
	    header("location:home1.html");
		
	}
}

else
{
	echo "<h1>user email or password is not matched<br/><br/></h1>";
}

}

?>
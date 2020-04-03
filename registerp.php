<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
</head>
<style>
    body
    {
        background-color:grey;
    }
    h1{
        font-size: 40px;
    }
</style>
<body>
    <form method="post" action="registerp.php">
    <h1><center>GO NEWS</center></h1>
        <center>
        <div class="">
            Email id: <input id="email" placeholder="email" name="email" type="text">
        </div>
        <br>
        <div class="">
            Username: <input id="username" placeholder="username" type="text" name="username">
        </div>
        <br>
        <div class="">
            Password: <input id="password" type="password" placeholder="password" name="password">
        </div>
        <br>
        <div>
        <button type="submit" value="login" name="login">Register</button>
        </div>
        <div>
        <p>Already have an account.<a href="index.php">Sign-in</a>    
    </div>
    </center>
    </form>
</body>
</html>

<?php
$configconn = mysqli_connect('localhost','root','','reg');  //connects to the database
//checking connection

if(!$configconn){
    echo 'Connection Error :' . mysqli_connect_error();
}
$user=['username' => '','password' => '','email' => ''];

if(isset($_POST['login'])){
  $user['username'] = $_POST['username'];
  $user['password'] = $_POST['password'];
  $user['email'] = $_POST['email'];
  $username =mysqli_real_escape_string($configconn,$_POST['username']);
  $password =md5(mysqli_real_escape_string($configconn,$_POST['password']));
  $email =mysqli_real_escape_string($configconn,$_POST['email']);
	//create sql
	$sql = "INSERT INTO login(username,password,email) VALUES('$username','$password','$email')";
	//save to db and check
	if(mysqli_query($configconn,$sql)){
		//success
        echo "<script>alert('RegisterSuccessfull');</script>";
        header('Location:index.php');

	}else{
		//error
		echo "<script>alert('username or password already exist');</script>";
	}
}	
?>
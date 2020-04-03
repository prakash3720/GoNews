<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">        
	<title>Login Page</title>
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
    <h1><center>GO NEWS</center></h1>
    <form method="post" action="loginp.php">
        <center><br><br>
        <div class="">
            Username: <input id="username" placeholder="username" type="text" name="username">
        </div>
        <br>
        <div class="">
            Password: <input id="password" type="password" placeholder="password" name="password">
        </div>
        <br>
        <div>
        <button type="submit" value="login" name="login">Login</button>
        </div>
    </center>
    </form>
</body>
</html>

<?php 
$configconn = mysqli_connect('localhost','root','','reg');
if(isset($_POST['username']))
{
    $dbuser='';
    $dbpass='';
    $username=$_POST['username'];
    $pass=md5($_POST['password']);
    $query = "select username,password from login where username='$username' AND password='$pass'";
    $result = mysqli_query($configconn,$query);
      while($row=mysqli_fetch_assoc($result))
      {
          $dbuser=$row['username'];
          $dbpass=$row['password'];
      }
      if($username == $dbuser && $pass == $dbpass)
      {

        header('Location:index.html');
      }
      else
      {
        echo "<script type='text/javascript'>alert(\"Invalid Username or Password\");</script>";
      }
}
?>
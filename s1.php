<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'mysql');
define('DB_USER','root');
define('DB_PASSWORD','123thisisit');
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
$db=mysqli_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysqli_error());
 $ID = $_POST['user'];
 $Password = $_POST['pass'];
  function SignIn() {
    session_start(); //starting the session for user profile page
    if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text
    {
      $query = mysql_query("SELECT * FROM UserName where userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error());
      $row = mysql_fetch_array($query) or die(mysql_error());
      if(!empty($row['userName']) AND !empty($row['pass']))
      {
        $_SESSION['userName'] = $row['pass'];
        echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
       }
        else
        {
          echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
        }
      }
    }
if(isset($_POST['submit']))
{
  SignIn();
 }

<!DOCTYPE html>
<head>
  <title> LOGIN </title>
  <link rel="stylesheet" type="text/css" href="style-sign.css">
</head>
<body>
<br><br>
<center>
<div id="Sign-In"> <fieldset style="width:30%"><legend>LOG-IN </legend>
  <center>
  <form method="GET" action="connectivity.php"> User <br>
    <input type="text" name="user" size="40"><br> Password <br>
    <input type="password" name="pass" size="40"><br>
    <input id="button" type="submit" name="submit" value="Log-In">
  </form> </fieldset> </div>


</body>
</html>
?>

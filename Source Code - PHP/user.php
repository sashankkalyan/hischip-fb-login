<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
    body,h1 {font-family: "Raleway", sans-serif}
    body, html {height: 100%}
    .centre {
        min-height: 100%;
        background-position: center;
        background-size: cover;
    }
    body{
      background-color: hsl(120, 100%, 90%);
      height:100%;
      width:100%;
    }
    </style>
</head>
<body>
<div class="centre w3-display-container w3-animate-opacity w3-text-black">
      <div class="w3-display-topleft w3-padding-large w3-xlarge">
        Hischip
      </div>
<div class="w3-display-middle">
<h6 class="w3-medium w3-animate-top"> 
<form method="post" action='user.php'>
<?php
//campaign id and also check login was successfull
//based on it ask the questions from table 1 
//get the options from answers and from 1 to 3 questions its score 3 to score 1 .
//options a to c are score 1 to score 3 
//based on that mean weight display the outcome (mean wieght is from 6 to 18).
//display this for now here.
require_once 'vendor/autoload.php';
session_start();
  $_SESSION['FBRLH_state']=$_GET['state'];

function value($answer)
{
  if($answer=='ans3')
    return 3;
  elseif ($answer=='ans2') {
    return 2;
  }
  else
    return 1;
}
  $host="localhost";
  $db_user="hischk8a_auser";
  $db_password="dklfrJA44BBT";
  $db_name="hischk8a_fca";
  $port="3306";


  $i=0;$outcome;
  $con=mysqli_connect($host,$db_user,$db_password,$db_name,$port);

  //  echo $row;
if ($result = mysqli_query($con, "select * from mcq ORDER by RAND() LIMIT 3")) {

    // fetch associative array 
    while ($obj = mysqli_fetch_object($result)) {
        //printf ("<br> %s <br> %s <br> %s <br> %s  ", $obj->QUESTION, $obj->ANSWER1, $obj->ANSWER2, $obj->ANSWER3);
echo '<h6><br><b>Question '.($i+1).'</b><br>'.$obj->QUESTION.'<br><input type="radio" name="Question'.$i.'" value="ans1">   '.   $obj->ANSWER1.'</h6>
  <h6><input type="radio" name="Question'.$i.'" value="ans2">   '.  $obj->ANSWER2.'</h6>
  <h6><input type="radio" name="Question'.$i.'" value="ans3">   '.  $obj->ANSWER3 .'</h6>';
  $i++;
}

echo '<br><br><input name="Submit" type="submit" value="Get Outcome">'.'</form>';
$res1=$_POST['Question0'];
$res2=$_POST['Question1'];
$res3=$_POST['Question2'];
  if(isset($_POST["Submit"]))
  {
$outcome=3*value($res1)+2*value($res2)+1*value($res3);
$_SESSION["OUT"]=$outcome;
$_SESSION["Check"]=100;
echo 'Your Score is <b>'.$outcome.'</b><br>The User is a <b>';
echo '</b><br><a href="http://www.interns.hischip.in/fca/index.php">Do you Want to Share to FB</a>';
$res=mysql_query($con,"select OUTCOME from outcome where MEAN_WEIGHT='".$outcome."';");
$out=mysql_fetch_object($res);
echo $out->outcome;

//header("Location: localhost/facebook/index.php");
//die();
}
//*/
   // free result set 
    mysqli_free_result($result);

}
?>
</body>
</html>
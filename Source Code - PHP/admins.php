<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
    body,h1 {font-family: "Raleway", sans-serif}
    body,html {height: 100%; } 
    .centre {
        min-height: 100%;
        background-position: center;
        background-size: cover;
    }
    .wrap {
        width:100%;
    }
    body{
      display: block;
      background-color: hsl(120, 100%, 90%);
      width:100%;
    }
    label {
    font-weight: bold;
    width:180px;
    clear:left;
    text-align:left;
    padding-right:10px;
}
    input,label { margin-bottom: 10px; float:left;  }
    </style>
</head>
<body>
    <div class="w3-display-topleft w3-padding-large w3-xlarge">
        Hischip
    </div>
     

<?php

session_start();

require_once 'vendor/autoload.php';

  $host="localhost";
  $db_user="hischk8a_auser";
  $db_password="dklfrJA44BBT";
  $db_name="hischk8a_fca";
  $port="3306";

  
  
  echo '
<div class="w3-display-topmiddle">
<center><h6 class="w3-medium w3-animate-top">
<form method="post" action='.'admins.php'.'>
<input type="submit" name="view" value="View">
<input type="submit" name="add" value="Insert">
<input type="submit" name="edit" value="Update">
<input type="submit" name="delete" value="Remove">
</form></h6></center>';
 $con=mysqli_connect($host,$db_user,$db_password,$db_name,$port);

if (isset($_POST['view'])) {
		view();
    } else if (isset($_POST['add'])||isset($_POST['adds']))
    {
		add();
    } else if (isset($_POST['edit'])||isset($_POST['edi']))
    {
		edit();
    }else if (isset($_POST['delete'])||isset($_POST['del']))
    {
		delete();
    } 


  function add()
  {
  	echo '<h6 class="w3-medium w3-animate-top w3-display-middle"><form method="post" action="admins.php">
  <label for="Id">ID</label>
  <input type="number" id="Id" name="id" value="">
  <label for="Qid">QuestionNo</label>
  <input type="number" id ="Qid" name="qid" value="">
  <label for="Ques">Enter the New Question</label>
  <input type="text" id="Ques" name="question" value="">
  <label for="n1">New Option 1</label>
  <input type="text" id="n1" name="ANSWER1" value="">
  <label for="n2">New Option 2</label>
  <input type="text" id="n2" name="ANSWER2" value="">
  <label for="n3">New Option 3</label>
  <input type="text" id="n3" name="ANSWER3" value="">
    <label for="add"></label>
<input type="submit" id="add" name="adds" value="ADD">
</form></h6>';
	
	if(isset($_POST['adds']))
	{  
 	$host="localhost";
  $db_user="hischk8a_auser";
  $db_password="dklfrJA44BBT";
  $db_name="hischk8a_fca";
  $port="3306";
  $con=mysqli_connect($host,$db_user,$db_password,$db_name,$port);
  
	$id=$_POST['id'];
	$ques=$_POST['question'];
	$qno=$_POST['qid'];
	$ans1=$_POST['ANSWER1'];
	$ans2=$_POST['ANSWER2'];
	$ans3=$_POST['ANSWER3'];
	
       $query="insert into mcq values('".$id."','".$qno."','".$ques."','".$ans1."','".$ans2."','".$ans3."');";//insert into mcq values(1,"ja","aks","sabj","ak");
       if (mysqli_query($con, $query)) {
    echo "<br>\n<br><br><br><label>CREATED</label>";
       } else {
    echo "Error: " . $squery . "<br>" . mysqli_error($con);
       }
	}
  } 

  function edit()
  {
echo '
<h6 class="w3-medium w3-animate-top"><form method="post" action="admins.php">
  <label for="Id">ID</label>
  <input type="number" id="Id" name="id" value="">
  <label for="Qid">QuestionNo</label>
  <input type="number" id ="Qid" name="qid" value="">
  <label for="Ques">Enter the New Question</label>
  <input type="text" id="Ques" name="question" value="">
  <label for="n1">New Option 1</label>
  <input type="text" id="n1" name="ANSWER1" value="">
  <label for="n2">New Option 2</label>
  <input type="text" id="n2" name="ANSWER2" value="">
  <label for="n3">New Option 3</label>
  <input type="text" id="n3" name="ANSWER3" value="">
  <label for="edit"></label>
  <input type="submit" id="edit" name="edi" value="Edit">
</form></h6>';

 	$host="localhost";
  $db_user="hischk8a_auser";
  $db_password="dklfrJA44BBT";
  $db_name="hischk8a_fca";
  $port="3306";

 
  
  $id=$_POST['id'];
  $qno=$_POST['qid'];
  $ques=$_POST['question'];
	$ans1=$_POST['ANSWER1'];
	$ans2=$_POST['ANSWER2'];
	$ans3=$_POST['ANSWER3'];
 
  	 $con=mysqli_connect($host,$db_user,$db_password,$db_name,$port);
  
    	if(isset($_POST['edi']))
{
  	$query="update mcq set QUESTION='".$ques."', ANSWER1='".$ans1."', ANSWER2='".$ans2."',ANSWER3='".$ans3."' where QNo='".$qno."'and CAMPAIGN_ID='".$id."';";
       
        if (mysqli_query($con, $query)) {
    echo "<br>\n<br><br><label>EDITED</label>";
       } else {
    echo "Error: " . $squery . "<br>" . mysqli_error($con);
       }

  } 
  } 
  function delete()
  { echo '<h6><form method="post" action="admins.php">
   <label for="Id">ID</label>
  <input id="Id" type="number" name="id" value=""><br>
  <label for="question">Question</label>
  <input type="text" id="question" name="question" value=""><br>
  <label for="delete"></label>
  <input type="submit" name="del" id="delete" value="DELETE"></label>
  </form>
  </h6></div>';
 	$host="localhost";
  $db_user="hischk8a_auser";
  $db_password="dklfrJA44BBT";
  $db_name="hischk8a_fca";
  $port="3306";

  	$id=$_POST['id'];
  	$qno=$_POST['question'];
  	$con=mysqli_connect($host,$db_user,$db_password,$db_name,$port);
  
    	if(isset($_POST['del']))
{
  	$query="delete from mcq
        where QNo='".$qno."'and CAMPAIGN_ID='".$id."';";
       
        if (mysqli_query($con, $query)) {
    echo "<br>\n<br><br><label>DELETED!!</label>";
       } else {
    echo "Error: " . $squery . "<br>" . mysqli_error($con);
       }

  } 
}
 function view()
  { 
  $host="localhost";
  $db_user="hischk8a_auser";
  $db_password="dklfrJA44BBT";
  $db_name="hischk8a_fca";
  $port="3306";
  $con=mysqli_connect($host,$db_user,$db_password,$db_name,$port);
  echo "<br><br>Campaign id,Question Number,Question,Answer1,Answer2,Answer3";
  
  if ($result = mysqli_query($con, "select * from mcq")) {
  while ($obj = mysqli_fetch_object($result)) {
  echo '<div class="wrap"><br>'.$obj->CAMPAIGN_ID. ' , '.$obj->QNo. ' , '.$obj->QUESTION.'<br>'. $obj->ANSWER1.'<br>'.$obj->ANSWER2.'<br>'. $obj->ANSWER3 .'</div>';
  }
  mysqli_free_result($result);
  }
  } 

?>
</body>
</html>

<!DOCTYPE html>
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
<?php

//Starts Session
session_start();
require_once 'vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '239469033190277', // Replace {app-id} with your app id
  'app_secret' => 'ed8effca0f5f013fa30f936e5f603e5c',
  'default_graph_version' => 'v2.8',
  ]);
$helper = $fb->getRedirectLoginHelper();
  $_SESSION['FBRLH_state']=$_GET['state'];


//Checks the access token
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

//Checks if access token is set
 if(isset($accessToken))
 {
  $fb->setDefaultAccessToken($accessToken);
  $response = $fb->get('/me?fields=email,name,id,birthday,age_range,gender');
  $userNode = $response->getGraphUser();
    //echo "Welcome !<br><br>";
    
    //Stores the details for Database connectivity use
    $name = $userNode->getName();
    $id = $userNode->getId();
    $age=$userNode->getProperty('age_range');
    $email=$userNode->getProperty('email');
    $gender = $userNode->getGender();
   
    // Print the user Details
    echo  '<h1 class="w3-jumbo w3-animate-top">Hello :) <br> </h1>
        <h1 class="w3-xlarge w3-animate-top"> <br><b>';
    echo  $userNode->getName().'<br>';
    echo  $userNode->getGender().'<br>';
    echo  $userNode->getId().'<br>';
    echo  $userNode->getProperty('email').'<br><br>';
    echo '</b></h1> <hr class="w3-border-grey" style="margin:auto;width:40%">';
  
    //Database Conectivity

  $host="localhost";
  $db_user="hischk8a_auser";
  $db_password="dklfrJA44BBT";
  $db_name="hischk8a_fca";
  $port="3306";

  $con=mysqli_connect($host,$db_user,$db_password,$db_name,$port);
  
    //Checks the connection
  /*if($con){
    echo "connection success";
  }
  else{
    echo "connection failed";

  }*/
    //Insertion into database
$sql="insert into informationfb values('".$name."','".$id."','".$gender."','".$email."')";
      $result=mysqli_query($con,$sql);
//      echo "\n Successfully Stored ";


}
?>
 <p class="w3-large w3-center">
<input type=button onClick="location.href='myfriends.php'" value='My Friends'>
<input type=button onClick="location.href='logout.php'" value='Logout'>
</p>
   </div>
      </div>
</body>
</html>
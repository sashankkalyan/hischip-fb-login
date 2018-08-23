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
<h1 class="w3-xxlarge w3-animate-top"> 

<?php

//This starts the session
session_start();

require_once 'vendor/autoload.php';
//Creating a Facebook Object
$fb = new Facebook\Facebook([
  'app_id' => '239469033190277', 
  'app_secret' => 'ed8effca0f5f013fa30f936e5f603e5c',
  'default_graph_version' => 'v2.8',
  ]);
$helper = $fb->getRedirectLoginHelper();
$_SESSION['FBRLH_state']=$_GET['state'];


//checking the access token for errors
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
//if access token is not set then call loginurl link
if(!isset($accessToken))
{
$permissions  = ['email','user_birthday','user_about_me','publish_actions'];
$loginUrl=  $helper->getReRequestUrl('http://www.interns.hischip.in/fca/index.php',$permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a><br>';
 
}

?>
<input type=button onClick="location.href='admins.php'" value='Admin'>
</h1>
<hr class="w3-border-grey" style="margin:auto;width:40%">
        <p class="w3-large w3-center"></p>
      </div>
    </div>
</body>
</html>
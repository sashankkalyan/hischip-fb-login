<?php
//Starts the session
session_start();

require_once 'vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '239469033190277', // Replace {app-id} with your app id
  'app_secret' => 'ed8effca0f5f013fa30f936e5f603e5c',
  'default_graph_version' => 'v2.8',
  ]);
$helper = $fb->getRedirectLoginHelper();
$access=$_SESSION["access"];
echo $access;

//checking access token
try {
    $accessToken = $helper->getAccessToken();
    echo "\n";
    //echo $accessToken->getValue();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
if($access)
{
  echo "hello world";}

//calling the taggable friends to obtain the friends list
 // $fb->setDefaultAccessToken($accessToken);
  //$response = $fb->api('/me/taggable_friends?fields=name');
  
?>
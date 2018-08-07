<?php

require_once 'vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '1605499796145715', // Replace {app-id} with your app id
  'app_secret' => '7c48f7c0b590745940727a57800d978d',
  'default_graph_version' => 'v2.8',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>
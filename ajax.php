<?php

require 'config.php';

header('Content-Type: application/json');

$email = $_POST['email'];

if(strcmp($_POST['want_to_help'], "true"))
{
	$involved = True;
}
else
{
	$involved = False;
}

$email = $con->real_escape_string($email);
$user_agent = $con->real_escape_string($_SERVER['HTTP_USER_AGENT']);
$user_ip = $con->real_escape_string($_SERVER['REMOTE_ADDR']);

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 	$response = json_encode(array("success" => False, "reason" => 'Invalid email address')); 
}


if($con->query("INSERT into emails (address, involved, ip, user_agent) VALUES ('$email', '$involved', '$user_ip', '$user_agent')")){
	$response = json_encode(array("success" => True,));	
}
else{
	$response = json_encode(array("success" => False, "reason" => 'You appear to have already signed up'));
}

echo $response;


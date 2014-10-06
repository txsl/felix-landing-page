<?php

require 'config.php';

header('Content-Type: application/json');

$email = $_POST['email'];

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 	$response = json_encode(array("success" => False, "reason" => 'Invalid email address')); 
}

$email = $con->real_escape_string($email);
$user_agent = $con->real_escape_string($_SERVER['HTTP_USER_AGENT']);
$user_ip = $con->real_escape_string($_SERVER['REMOTE_ADDR']);

if($con->query("INSERT into emails (address, ip, user_agent) VALUES ('$email', '$user_ip', '$user_agent')")){
	$response = json_encode(array("success" => True,));	
}
else{
	$response = json_encode(array("success" => False, "reason" => 'You appear to have already signed up'));
}

$sections = ['news', 'comments', 'science', 'politics', 'business', 'arts', 'music', 'film', 'fashion', 'games',
			'tech', 'travel', 'food', 'tv', 'books', 'sports']

if ($_GET['all'] == 'yes'){
	
}

echo $response;


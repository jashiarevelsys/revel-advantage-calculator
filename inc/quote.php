<?php 

include 'keys.php';
$email = $_POST['email'];
$secret = MUNCHKIN_API_KEY . $email;
$munchkinHash = hash('sha1', $secret);
echo json_encode($munchkinHash);

 ?>
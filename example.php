<?php
//Original code downloaded from:
//http://www.webdigi.co.uk/blog/2009/how-to-check-if-an-email-address-exists-without-sending-an-email/
include('smtpvalidate.class.php');

// the email to validate

/*Validate a list of emails*/
$file = 'list.txt';
$fp = fopen($file, 'r');
$contents = fread($fp, filesize($file));
fclose($fp);
$emails = explode("\r\n",$contents);

/*Validate single email*/
$email_array = array('Example@example.com');
$emails = array_map('strtolower', $email_array);

// an optional sender
// $sender = array('user@example.com');

// instantiate the class
$SMTP_Valid = new SMTP_validateEmail();
// do the validation

// $result = $SMTP_Valid->validate($emails,$sender); //for is the $sender is set
$result = $SMTP_Valid->validate($emails);

// view results
foreach ($emails as $key => $value) {
	echo $value . ':  ' . ($result[$value] ? 'valid' : 'invalid') . "\n";
}
?>

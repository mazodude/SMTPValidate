<?php
//Original code downloaded from:
//http://www.webdigi.co.uk/blog/2009/how-to-check-if-an-email-address-exists-without-sending-an-email/
/*
Notes to remember:
All emails must have no trailing or prepending info

return number meanings
0 = fail
1 = pass
2 = maybe (server down or something)
*/
include('smtpvalidate.class.php');

// the email to validate

/*Validate a list of emails*/
$file = 'list.txt';
$fp = fopen($file, 'r');
$contents = fread($fp, filesize($file));
fclose($fp);
$emails = explode("\r\n",$contents);

/*Validate single email*/
$emails = array('example@example.com');

// an optional sender
// $sender = array('user@example.com');

// instantiate the class
$SMTP_Valid = new SMTP_validateEmail();
// do the validation

// $result = $SMTP_Valid->validate($emails,$sender); //for is the $sender is set
$result = $SMTP_Valid->validate($emails);

// view results
foreach ($emails as $key => $value) {
	echo $value . ':  ' . ($result[$value][0] ? 'valid' : 'invalid') . " Message: ".$result[$value][1]."\n";
}
?>

<?php
$host = '4csyzrx1.epizy.com';
if($socket =@ fsockopen($host, 80, $errno, $errstr, 30)) {
echo 'online!';
fclose($socket);
} else {
	$msg = "The server has not connected\nI'm not sure what else to do";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("ggreiner1995@aol.com","Server status",$msg);

echo 'offline.';
}
?>
<?php
$con = mysql_connect("localhost","notifier","notify4gls**");
if (!con)
	{
	die('Could not connect: ' . mysql_error());
	}
mysql_select_db("notify", $con);

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['phone'];
$provider = $_POST['provider'];
$text = "$mobile$provider";
$email2 = $_POST['email2'];

mysql_query("INSERT INTO subscribers (name, email, email2, mobile) VALUES ('$name', '$email', '$email2', '$text')");

mysql_close($con); 
echo "$name thank you for your submission.<br />";  
echo "";
echo "The following information has been recorded:<br />";
echo "Gelman Email: $email<br/>";
echo "Personal Email: $email2:<br />";
echo "Mobile: $text";
?>
<title>Gelman Alert - Subscribe</title>

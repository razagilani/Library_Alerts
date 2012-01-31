<?php

$con=mysql_connect("localhost","notifier","notify4gls**");
if (!con)
        {
        die('Could not connect: ' . mysql_error());
        }
mysql_select_db("notify", $con);  

if(isset($_GET['email']))
$email="'".$_GET['email']."'";
if(isset($_GET['email2']))
$email2="'".$_GET['email2']."'";
if(isset($_GET['mobile']))
$mobile="'".$_GET['mobile']."'";

if(isset($_GET['email']))
{
mysql_query("DELETE from subscribers where email=$email ") or die(mysql_error());  

echo "<HTML>";
echo "<HEAD>";
echo "<TITLE> unsubscribe page </TITLE>";
echo "</HEAD>";
echo "<BODY>";
echo "<H1>Your subscription with address $email to Gelman Alert System has been successfully removed</H1>";
echo "</BODY>";
echo "</HTML>";

}
else if(isset($_GET['email2']))
{
mysql_query("DELETE from subscribers where email2=$email2 ") or die(mysql_error());  

echo "<HTML>";
echo "<HEAD>";
echo "<TITLE> unsubscribe page </TITLE>";
echo "</HEAD>";
echo "<BODY>";
echo "<H1>Your subscription with address $email2 to Gelman Alert System has been successfully removed</H1>";
echo "</BODY>";
echo "</HTML>";

}
else if(isset($_GET['mobile']))
{
mysql_query("DELETE from subscribers where mobile=$mobile") or die(mysql_error());  

echo "<HTML>";
echo "<HEAD>";
echo "<TITLE> unsubscribe page </TITLE>";
echo "</HEAD>";
echo "<BODY>";
echo "<H1>Your subscription with number $mobile to Gelman Alert System has been successfully removed</H1>";
echo "</BODY>";
echo "</HTML>";

}

mysql_close($con);




?>

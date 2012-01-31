<?php
session_start();
if(!session_is_registered(myusername)){
header("location:main_login.php");
}
$con = mysql_connect("localhost","notifier","notify4gls**");
if (!con)
	{
	die('Could not connect: ' . mysql_error());
	}
mysql_select_db("notify", $con);
$sql="SELECT email, email2, mobile FROM subscribers";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
$to = $row["email"] .', ';
$to2 = $row["email2"] .', ';
$text = $row["mobile"] .'. ';
$to1=$row["email"];
$to3= $row["email2"];
$mob= $row["mobile"];
$pos = strpos ($mob,'@');
$to = str_replace("\n","",$to);
$to= str_replace("\r","",$to);
$to2 = str_replace("\n","",$to2);
$to2= str_replace("\r","",$to2);
$text = str_replace("\n","",$text);
$text= str_replace("\r","",$text);

$text1 = substr($mob,0,$pos);
if($to1 =="")
	$email=false;
else
	$email=true;
if($to3 == "")
	$email2=false;
else
	$email2=true;
if($text1 == "")
	$mobile=false;
else
	$mobile=true;
$subject = $_POST['subject'];
$subject= str_replace("\n","",$subject);
$subject= str_replace("\r","",$subject);
$msg=$_POST['limitedtextarea'];
$message = "<HTML><BODY> <P>".$_POST['limitedtextarea']."</P>";
if($email==true && $email2==true && $mobile== true)
{
	 $message .=   "<br> to unsubscribe from the list click <a HREF=http://gwdroid.wrlc.org/notify_system/alerts/unsubscribe.php?email=";
	 $message .=$to1;
	 $message .="&email2=";
	 $message .=$to3;
	 $message .="&mobile=";
	 $message .=$text1;
	 $message .="> here </a>";
}
else if($email==true && $email2==false && $mobile==false)
{
	 $message .=   "<br> to unsubscribe from the list click <a HREF=http://gwdroid.wrlc.org/notify_system/alerts/unsubscribe.php?email=";
         $message .=$to1;
         $message .="> here </a>";

}
else if($email==true && $email2==true && $mobile== false )
{
	 $message .=   "<br> to unsubscribe from the list click <a HREF=http://gwdroid.wrlc.org/notify_system/alerts/unsubscribe.php?email=";
         $message .=$to1;
	 $message .="&email2=";
         $message .=$to3;
	 $message .="> here </a>";
}
else if($email==true && $email2==false && $mobile== true)
{
	 $message .=   "<br> to unsubscribe from the list click <a HREF=http://gwdroid.wrlc.org/notify_system/alerts/unsubscribe.php?email=";
         $message .=$to1;
	 $message .="&mobile=";
         $message .=$text1;
         $message .=">here</A>";

}
else if($email==false && $email2==true && $mobile== true)
{
	 $message .=   "<br> to unsubscribe from the list click <A HREF=http://gwdroid.wrlc.org/notify_system/alerts/unsubscribe.php?";
	 $message .="&email2=";
         $message .=$to3;
         $message .="&mobile=";
         $message .=$text1;
         $message .="> here </a>";

}
else if($email==false && $email2==true && $mobile== false)
{
	 $message .=   "<br> to unsubscribe from the list click <A HREF=http://gwdroid.wrlc.org/notify_system/alerts/unsubscribe.php?";
         $message .="&email2=";
         $message .=$to3;
	 $message .="> here </a>";
}
else if($email==false && $email2==false && $mobile== true)
{
	 $message .=   "<br> to unsubscribe from the list click <A HREF=http://gwdroid.wrlc.org/notify_system/alerts/unsubscribe.php?";
	 $message .="&mobile=";
         $message .=$text1;
         $message .="> here </a>";
}
$message .="</html> </body>";
	$poster = $_POST['poster'];
$date = date('l jS \of F Y h:i:s A');
$hdr='From: Gelman Alerts <alerts@gelman.gwu.edu>';
$headers ='MIME-Version: 1.0'."\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\n" ;
$headers .= 'From: Gelman Alerts <alerts@gelman.gwu.edu>';

mail($to, $subject, $message, $headers);
mail($to2, $subject, $message, $headers);
mail($text, $subject, $msg, $hdr);
//mail($text, $subject, $msg);

}
mysql_query("INSERT INTO notifications (date, poster, message) VALUES ('$date', '$poster', '$message')");
echo "The following message has been sent to all subscribers:";
echo " <b>".$message."</b>";
mysql_free_result($result);
?>
<title>Gelman Alert - Notification Results</title>

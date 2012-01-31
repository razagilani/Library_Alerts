<?php
ob_start();
$host="localhost"; // Host name
$username="notifier"; // Mysql username
$password="notify4gls**"; // Mysql password
$db_name="notify"; // Database name
$tbl_name="alerters"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

//encrypt password
$encrypted_mypassword=md5($mypassword);

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
// $encrypted_mypassword = stripsplashes($encrypted_mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$encrypted_mypassword = mysql_real_escape_string($encrypted_mypassword);

$headers = "From: Gelman Alerts <alerts@gelman.gwu.edu>\n";
$to = "gilani@gelman.gwu.edu";
$subject = "New Account Created";
$message = "Username:";

$sql="SELECT * FROM $tbl_name WHERE username='$myusername'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername table row must be 1 row

if($count==1){
// Account already exists! FML, redirect to: "main_login.php"
echo "Account already Exists! FAIL!";
header("location:main_login.php");
}
else{
mysql_query("INSERT INTO alerters (username, password) VALUES ('$myusername', '$encrypted_mypassword')");
mail($to, $subject, $myusername, $headers);
echo "Account Created!";

}
ob_end_flush();
?>
<html>
<a href="http://gwdroid.wrlc.org/notify_system/alerts/">Click here to login</a>
</html>

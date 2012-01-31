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

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$encrypted_mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $encrypted_mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $encrpypted_mypassword and redirect to file "login_success.php"
session_start();

//session_register("myusername");
//session_register("mypassword");
$_SESSION['user']=$myusername;
$_SESSION['password']=$mypassword;
//echo $_SESSION['user'];
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}

ob_end_flush();
?>

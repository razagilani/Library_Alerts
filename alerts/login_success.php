<?php
session_start();

if(isset($_SESSION['user']))
{
header("Location: http://gwdroid.wrlc.org/notify_system/alerts/newalert.php");

}
else
{
header("Location: http://gwdroid.wrlc.org/notify_system/alerts/main_login.php");
//echo "not found";
//echo $_SESSION['user'];
}
?>
<!--
<html>
<body>
Login Successful
</body>
</html>
-->

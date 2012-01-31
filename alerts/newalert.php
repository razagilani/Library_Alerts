<?php                                                                   
session_start();
if(!isset($_SESSION['user'])){
header("location:main_login.php");
}
$info=($_POST && $errors)?Format::htmlchars($_POST):array(); //on error...use the post data
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Gelman Alerts - Create Message</title>
<meta name="robots" content="noindex" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="pragma" content="no-cache" />
</head>
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
         function isEmpty(str) {
            // Check whether string is empty.
            for (var intLoop = 0; intLoop < str.length; intLoop++)
               if (" " != str.charAt(intLoop))
                  return false;
            return true;
         }

         function checkRequired(f) {
            var strError = "";
            for (var intLoop = 0; intLoop < f.elements.length; intLoop++)
               if (null!=f.elements[intLoop].getAttribute("required")) 
                  if (isEmpty(f.elements[intLoop].value))
                     strError += "  " + f.elements[intLoop].name + "\n";
            if ("" != strError) {
               alert("Required data is missing:\n" + strError);
               return false;
            } else
            return true       
         }
</script>
<div>
    <?if($errors['err']) {?>
        <p align="center" id="errormessage"><?=$errors['err']?></p>
    <?}elseif($msg) {?>
        <p align="center" id="infomessage"><?=$msg?></p>
    <?}elseif($warn) {?>
        <p id="warnmessage"><?=$warn?></p>
    <?}?>
</div>
<form name="input" action="mail.php" method="POST" ONSUBMIT="return checkRequired(this)">
<table border=0 align="center">
<tr><td align="center" >Please fill out the form below to distribute a Gelman Alert.</td></tr>
</table>
<table border=0 align="center">
<tr><td width=100px align="left" ><b>Posted by:</b></td><td><input type="text" name="poster" required /></td></tr>

<tr><td width=100px align="left" ><b>Subject:</b></td><td><input type="text" name="subject" /></td></tr>

<tr><td width=100px align="left" ><b>Alert Text:</b></td>
<td align="left" ><textarea name="limitedtextarea" onKeyDown="limitText(this.form.limitedtextarea,this.form.countdown,160);" 
onKeyUp="limitText(this.form.limitedtextarea,this.form.countdown,160);">
</textarea>
<br><font size="1">(Maximum characters: 160)</br>
You have <input readonly type="text" name="countdown" size="3" value="160"> characters left.</font>
</td>
</tr>
    <tr height=2px><td align="left" colspan=2 >&nbsp;</td</tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="Submit" />
            <input type="reset" value="Reset" />
        </td>
    </tr>
</table>
</form>
</html>

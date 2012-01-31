<?php
$info=($_POST && $errors)?Format::htmlchars($_POST):array(); //on error...use the post data
?>
<title> Gelman Alert - Subscribe</title>
<div>
    <?if($errors['err']) {?>
        <p align="center" id="errormessage"><?=$errors['err']?></p>
    <?}elseif($msg) {?>
        <p align="center" id="infomessage"><?=$msg?></p>
    <?}elseif($warn) {?>
        <p id="warnmessage"><?=$warn?></p>
    <?}?>
</div>
<div>Please fill in the form below to subscribe to Gelman Alerts.</div><br>
<form action="notify.php" method="POST">
<table>
<tr>
	<th>Full Name:</th>
  <td>
	<input type="text" name="name" />
  </td>
</tr>
<tr>
	<th>Gelman Email Address:</th>
  <td>
	 <input type="text" name="email" />
  </td>
</tr>
<tr>
        <th>Personal Email Address:</th>
  <td>
         <input type="text" name="email2" />
  </td>
</tr>
<tr>
	<th>Mobile Number:</th>
  <td>
	<input type="text" name="phone" />
  </td>
</tr>
<tr>
	<th>Mobile Service Provider:</th>
  <td>	    
	    <select name="provider"
		<option value="@messaging.alltel.com">Alltel</option>
                <option value="@txt.att.net">AT&T</option>
		<option value="@myboostmobile.com">Boost Mobile</option>
		<option value="@mms.mycricket.com">cricKet</option>
		<option value="@mymetropcs.com">MetroPCS</option>
		<option value="@messaging.nextel.com">Nextel</option>
                <option value="@messaging.sprintpcs.com">Sprint</option>
		<option value="@tmomail.net">T-Mobile</option>
		<option value="@vmobl.com">Virgin Mobile</option>
		<option value="@vtext.com" >Verizon</option>
            </select>
  </td>
</tr>
    <tr height=2px><td align="left" colspan=2 >&nbsp;</td</tr>
    <tr>
        <td></td>
        <td>
            <input class="button" type="submit" name="submit_x" value="Submit">
            <input class="button" type="reset" value="Reset">
        </td>
    </tr>
</table>
</form>
<table>
<tr><td width=500px align="center"> Gelman Library will not share this information with anyone. If you'd like to subscribe to text message alerts please provide your mobile phone number and select your mobile service provide above. <br><br><b> Normal text messaging rate will apply</b>.</td></tr>
</table>

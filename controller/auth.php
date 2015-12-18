<?php
require("../model/user.php");
if (isset($_POST["login"]) && ! empty($_POST["login"])) {
	# code...
$user=$_POST["login"];
$pwd=$_POST["password"];
$mypage=new user($user,$pwd);
echo $mypage->affiche();


}





?>
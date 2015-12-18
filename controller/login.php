<?php

session_start();


require '../model/client.php';
require_once("../lib/connect.php");


$client=new client();

$email = post_value_or('email');
$password=post_value_or("mdp");

$myreturn=$client->auth($email,$password);

if(mysqli_num_rows($myreturn)>0)
{

$_SESSION['login'] = get_info($email);

$state=state($email);
if($state=="client")
{

header("location:/banc/view/welcome.php");
}
else
{
	header("location:/banc/view/admin.php");

}

}
else
{
header("location:/banc/view/login.php");
}


function post_value_or($key, $default = NULL) {
    return  isset($_POST[$key]) && !empty($_POST[$key]) ? $_POST[$key] : $default;
}


function get_info($ch)
{
$con=new connect();

$rs=$con->Query(" select * from admin where email='$ch' ");

$data=$rs->fetch_array();
return $data["id"];




}



function state($ch)
{
$con=new connect();

$rs=$con->Query(" select * from admin,client where email='$ch' and admin.id=client.id_client ");

$data=$rs->fetch_array();
return $data["state"];




}




?>


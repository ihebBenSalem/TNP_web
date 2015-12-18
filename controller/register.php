<?php
require '../model/client.php';


$client=new client();

$nom = post_value_or('t1');
$prenom=post_value_or("t2");
$email=post_value_or("t3");
$password=post_value_or("t4");
$state=post_value_or("state");

$client->inscrire($nom,$prenom,$email,$password,$state);

header("location:/banc/view/register.php?msg=register with success");


function post_value_or($key, $default = NULL) {
    return  isset($_POST[$key]) && !empty($_POST[$key]) ? $_POST[$key] : $default;
}



?>
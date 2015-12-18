<?php

require("user.php");
require_once("../lib/connect.php");
require_once("gestion_compte.php");


/**
* 
*/
class client extends user implements gestion_compte
{
	

	function __construct()
	{
		# code...
	}

public function consulter_solde()
{

}

public function transfert()
{

}



public function auth($email,$password)
{
	$con=new connect();

$cc=$con->Query(" select email,password from admin where email='$email' and password='$password' ");
return $cc;
}


function inscrire($nom,$prenom,$email,$pwd,$state){
$con=new connect();
	
if ($con->Query(" insert into admin (email,password) values ('$email','$pwd') ")) {
$a=$con->Query("select * from admin where email='$email' ");
$data=$a->fetch_array();
$this->id_client=$data["id"];
$RIB=$this->generateID();
$con->Query(" insert into client (nom,prenom,id_client,state,RIB,solde) values ('$nom','$prenom','$this->id_client','$state','$RIB','0') ");
echo "registered with success";



}
else
{
	echo "fail to insert";
}


}


public function supprimer()
{
}



function generateID()
{
    $capital_letters = range("A", "Z");
    $lowcase_letters = range("a", "z");
    $numbers         = range(0, 9);

    $all = array_merge($capital_letters, $lowcase_letters, $numbers);
    $count = count($all);    
    $id    = "";

    for($i = 0; $i < 10; $i++)
    {
        $key = rand(0, $count-1);
        $id .= $all[$key];
    }
    return $id;
}



}







?>
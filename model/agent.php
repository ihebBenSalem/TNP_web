<?php

require("user.php");
require("gestion_client.php");
/**
* 
*/
class agent extends user implements gestion_client
{
	
	function __construct()
	{
		# code...
	}

public function affectation_client()
{

}



public function auth($email,$password)
{
	$con=new connect();

$cc=$con->Query(" select email,password from admin where email='$email' and password='$password' ");
return $cc;
}


public function inscrire($nom,$prenom,$email,$pwd,$state){
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
	$con=new connect();
	$con->Query(" delete from admin where id ='$this->id_client' ");
}





}


?>
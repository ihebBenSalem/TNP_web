<?php


/**
* 
*/
require("../lib/connect.php");
abstract class user
{
	
public $db,$nom,$prenom,$email,$login,$pwd,$con,$id_client;


	function __construct()
	{
		# code...
		
	}



abstract function supprimer();
abstract function inscrire($nom,$prenom,$email,$pwd,$state);
abstract function auth($email,$password);































































}





?>
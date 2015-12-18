<?php
require_once("define.php");


/**
* 
*/
class connect {

public $db;	
	function __construct()
	{
		# code...
		$this->db=new mysqli (host,username,pwd,db);

	}


function Query($ch)
{
	return $this->db->query($ch);
}


}




?>
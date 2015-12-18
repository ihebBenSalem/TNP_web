<?php
require_once("../lib/connect.php");


session_start();
$id=$_SESSION["login"];
$con=new connect();
$nom="";
$prenom="";
$solde="";
$RIB="";

$request=$con->Query(" select * from client where id_client='$id' ");

while ($data=$request->fetch_array()) {
	# code...
	$nom= $data["nom"];
	$prenom= $data["prenom"];
	$RIB= $data["RIB"];
	$solde= $data["solde"];
}






?>



<link rel="stylesheet" type="text/css" href="/src/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/src/bootstrap/css/material.min.css">
<link rel="stylesheet" type="text/css" href="/src/adminLTE/adminLTE.min.css">
<link rel="stylesheet" type="text/css" href="/src/adminLTE/skin-red-light.css">
<style type="text/css">
body{
	background-color: #E5E5E5;
}
></style>

<script type="text/javascript" src="/src/jquery.js"></script>
<script type="text/javascript" src="/src/bootstrap/js/bootstrap.min.js"></script>
<nav class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header container">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">Myprofile</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
		
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
			<span class="glyphicon  icon-music" aria-hidden="true"></span>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-icon icon-music" aria-hidden="true"></span><?php echo $nom." ".$prenom   ?><b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">  Settings</a></li>
					<li><a href="/banc/view/logout.php">LogOut</a></li>
					
				</ul>
			</li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>


<div class="col-md-12">

<div class="col-md-3">
		<div class="callout callout-success lead ">
			<h4>RIB <?php echo $RIB  ?></h4>
<p></p>
		</div>

</div>
	<div class="col-md-9" >
		<div class="callout callout-info lead">
			<h4>! Welcome to your session <?php echo $nom." ".$prenom  ?></h4>
<p></p>
		</div>

		<div class="callout callout-danger lead col-md-3">
			<h4>Your solde <?php echo $solde  ?></h4>
<p></p>
		</div>






	</div>


	</div>
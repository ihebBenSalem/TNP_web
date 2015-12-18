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

if (isset($_POST["del"]) && ! empty($_POST["del"])) {
	# code...
	$del_client=$_POST["del"];
$con->Query(" delete from admin where id='$del_client' ");

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
<nav class="navbar navbar-inverse" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header container">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">AdminPannel</a>
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
<?php

$aa=$con->Query(" select * from client where state='client' ");



?>

<div class="box ">
	<div class="box box-body">
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#id</th>
				<th>#nom</th>
				<th>#prenom</th>
				<th>#RIB</th>
				<th>#sold</th>
				<th>#Del</th>
			</tr>
		</thead>
		<tbody>

<?php
while ($result=$aa->fetch_array()) {
	# code...
echo '<tr>
<td>'.$result["id_client"].'</td>
<td>'.$result["nom"].'</td>
<td>'.$result["prenom"].'</td>
<td>'.$result["RIB"].'</td>
<td>'.$result["solde"].'</td>
<td><form method="post"><button type="submit" value="'.$result["id_client"].' " class="btn btn-danger btn-small" name="del">delete</button></form></td>


</tr>';

}
			
	

?>
		</tbody>
	</table>
</div>
	</div>


</div>










	</div>


	</div>
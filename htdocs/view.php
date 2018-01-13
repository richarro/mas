<!DOCTYPE HTML>  
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/bootstrap.min.js"></script>
<style>

</style>
</head>
<body>  
<h1>Membership and Accounting System</h1>

<div class="menu">
	<ul>
		<li><a href="index.php" <?php if( $page == 'index') echo 'class="active"'?> >Index</a></li>
		<li><a href="view.php" <?php if( $page == 'view') echo 'class="active"'?> >View</a></li>
		<li><a href="add.php" <?php if( $page == 'about') echo 'class="active"'?> >Add</a></li>
	</ul>
</div>

<h2>View Current Membership</h2>
<div class="container">
		<div class="row">
	<table class="table table-striped table-bordered">
			<thead>
			<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email Address</th>
			<th>Phone Number</th>
			<th>Description</th>
			<th>Add Date</th>
			</tr>
			</thead>
		<tbody>
		
<!-- /use PHP to connect to the database using the database.php file -->			
<?php
include 'database.php';
	$pdo = Database::connect();
	$sql = 'SELECT * FROM MEMBERS A, ref_typ_desc B WHERE A.type=B.typ_cd ORDER BY ID DESC';
	foreach ($pdo->query($sql) as $row) {
			echo '<tr>';
			echo '<td>'. $row['id'] . '</td>';
			echo '<td>'. $row['fname'] . '</td>';
			echo '<td>'. $row['lname'] . '</td>';
			echo '<td>'. $row['email'] . '</td>';
			echo '<td>'. $row['phone'] . '</td>';
			echo '<td>'. $row['description'] . '</td>';
			echo '<td>'. $row['add_date'] . '</td>';
			echo '</tr>';
								 }
Database::disconnect();
?>
			</tbody>
	</table>
</div>
	</div> <!-- /container -->

</body>
</html>
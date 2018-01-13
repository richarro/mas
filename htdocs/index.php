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
<div class="container">
<div class="row">
		<h3>View Current Membership</h3>
</div>
<div class="row">
		<p>
				<a href="create.php" class="btn btn-success">Add a New Member</a>
		</p>
		<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<?php
 include 'database.php';
 $pdo = Database::connect();
 $sql = 'SELECT * FROM members ORDER BY id DESC';
 foreach ($pdo->query($sql) as $row) {
					echo '<tr>';
					echo '<td>'. $row['id'] . '</td>';
					echo '<td>'. $row['fname'] . '</td>';
					echo '<td>'. $row['lname'] . '</td>';
					echo '<td>'. $row['email'] . '</td>';
					echo '<td><a class="btn" href="read.php?id='.$row['id'].'">Read</a></td>';
					echo '</tr>';
 }
 Database::disconnect();
?>
					</tbody>
		</table>
</div>
</div> <!-- /container -->
<h2>View Extended Membership Information</h2>
<li><a href="view.php" <?php if( $page == 'view') echo 'class="active"'?> >View</a></li>


</body>
</html>
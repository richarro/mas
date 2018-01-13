<?php
	 
require 'database.php';
 
if ( !empty($_POST)) {
// keep track validation errors
		$fnameError = null;
		$lnameError = null;
		$emailError = null;
		$phoneError = null;
		$typeError = null;
		 
// keep track post values
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$type = $_POST['type'];
		
// validate input
		$valid = true;
		if (empty($fname)) {
			$fnameError = 'Please enter Name';
			$valid = false;
		}
		 
		$valid = true;
		if (empty($lname)) {
			$lnameError = 'Please enter Name';
			$valid = false;
		}
		
		if (empty($email)) {
			$emailError = 'Please enter Email Address';
			$valid = false;
			
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$emailError = 'Please enter a valid Email Address';
			$valid = false;
		}
		
		$valid = true;
		if (empty($phone)) {
			$phoneError = 'Please enter phone number';
			$valid = false;
		}

		$valid = true;
		if (empty($type)) {
			$typeError = 'Please select membership type';
			$valid = false;
		}
			 
// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO members (fname,lname,email,phone,type) values(?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($fname,$lname,$email,$phone,$type));
			Database::disconnect();
			header("Location: index.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="js/bootstrap.min.js"></script>
</head>
 
<body>
<div class="container">
		 
<div class="span10 offset1">
		<div class="row">
		<h3>Add a New Member</h3>
		</div>
 
<form class="form-horizontal" action="create.php" method="post">
	<div class="control-group <?php echo !empty($fnameError)?'error':'';?>">
		<label class="control-label">First Name</label>
		<div class="controls">
				<input name="fname" type="text"  placeholder="First Name" value="<?php echo !empty($fname)?$fname:'';?>">
				<?php if (!empty($fnameError)): ?>
						<span class="help-inline"><?php echo $fnameError;?></span>
				<?php endif; ?>
		</div>
	</div>
	
	<div class="control-group <?php echo !empty($lnameError)?'error':'';?>">
		<label class="control-label">Last Name</label>
		<div class="controls">
				<input name="lname" type="text"  placeholder="Last Name" value="<?php echo !empty($lname)?$lname:'';?>">
				<?php if (!empty($lnameError)): ?>
						<span class="help-inline"><?php echo $lnameError;?></span>
				<?php endif; ?>
		</div>
	</div>
	
	<div class="control-group <?php echo !empty($emailError)?'error':'';?>">
		<label class="control-label">Email Address</label>
		<div class="controls">
				<input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
				<?php if (!empty($emailError)): ?>
						<span class="help-inline"><?php echo $emailError;?></span>
				<?php endif;?>
		</div>
	</div>
	
	<div class="control-group <?php echo !empty($phoneError)?'error':'';?>">
		<label class="control-label">Phone Number</label>
		<div class="controls">
				<input name="phone" type="text" placeholder="Phone Number" value="<?php echo !empty($phone)?$phone:'';?>">
				<?php if (!empty($phoneError)): ?>
						<span class="help-inline"><?php echo $phoneError;?></span>
				<?php endif;?>
		</div>
	</div>

	<div class="control-group <?php echo !empty($typeError)?'error':'';?>">
		<label class="control-label">Membership Type</label>
		<div class="controls">
				<input name="type" type="text" placeholder="Membership Type" value="<?php echo !empty($type)?$type:'';?>">
				<?php if (!empty($typeError)): ?>
						<span class="help-inline"><?php echo $typeError;?></span>
				<?php endif;?>
		</div>
	</div>

	<div class="form-actions">
	<button type="submit" class="btn btn-success">Create</button>
	<a class="btn" href="index.php">Back</a>
	</div>
</form>
</div>
								 
</div> <!-- /container -->
</body>
</html>
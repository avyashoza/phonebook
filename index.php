<?php 
	require_once"connection.php";

	$contacts = array();

	$all_contacts = "select * from contacts where contact_status = '1'";

	$sql_all_contacts = $conn->query($all_contacts);

	$total_contacts = $sql_all_contacts->num_rows;

	while ($row = mysqli_fetch_assoc($sql_all_contacts)) {
		$contacts[] = $row;

	$url = 'C:\wamp\www\login\ab.jpg';
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<?php include"includes/head.inc"; ?>
	<style type="text/css">
	body{
		background-image: url('<?php echo $url ?>');
	}
</style>
</head>
<body>
	<div class="wrapper">

		<!-- header section -->
		<?php include"includes/header.inc"; ?>

		<!-- content section -->
		<div class="content">

			<div class="floatl"><h1><?php echo $total_contacts ?> Contact(s) Total</h1></div>

			<a class="floatr" href="insert_contact.php"><input class="cancel_contact_button" type="button" value="New Contact"></a>		
			<div class="clear"></div>
				<hr class="pageTitle">
				<table id="contactsTable" class="display">
					<thead>
						<tr align="left">
							<th>Name:</th>
							<th>Nickname:</th>
							<th>Cell Phone:</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					 	<?php foreach ($contacts as $contact) {?>
						<tr>
							<td><a href="contact.php?id=<?php echo $contact["contact_id"]; ?>"><?php echo $contact["contact_fname"] . " " . $contact["contact_lname"]; ?></a></td>
							<td><?php echo $contact["contact_nickname"]; ?></td>
							<td><?php echo $contact["contact_cphone"]; ?></td>
							<td><a href="update_contact.php?id=<?php echo $contact["contact_id"]; ?>"><i class="fa fa-pencil"></i></a> | <a href="delete_contact.php?id=<?php echo $contact["contact_id"] ?>"><i class="fa fa-trash-o"></i></a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
		</div>
	</div>	
	<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
	<!--<div class="content"> -->

		<!-- notification message -->
		<!--<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div> --> 
		<?php endif ?>
		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<!--<p align="center">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p> -->
			<font size="4"><p align="center"> <a href="index.php?logout='1'" style="color: red;"><input type="button" style="color: white; background-color: red; font-size: 19px; font-family: bold; padding: 10px; " name="submit" value="Logout"></a> </p>
		</font>
		<?php endif ?>
	</div>
	
</body>
</html>		
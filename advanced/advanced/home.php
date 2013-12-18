<?php
	include_once("connection.php");
	include_once("Users.php");
	session_start();
	$userDatabase = new Users();
?>

<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="global.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

	<script type="text/javascript">
	// $(document).ready(function(){
	// });
	</script>

</head>
<body>
<div class="container">
	<h3>Welcome, <?= $_SESSION['user']['first_name'] ?>!</h3>
	<h5><?= $_SESSION['user']['email'] ?></h5>
	<form action="process.php" method="post">
		<input type="hidden" name="action" value="logoff" />
		<input type="submit" value="Log off" />
	</form>

	<div class="friends">
		<h3>List of Friends</h3>
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$friends = $userDatabase->findFriends($_SESSION['user']['id']);
					// var_dump($friends);
					foreach($friends as $user){
						echo '<tr><td>'.$user['full_name'].'</td><td>'.$user['email'].'</td></tr>';
					}
				?>
			</tbody>
		</table>
	</div>

	<div class="all_users">
		<h3>List of Users who subscribed to Friend Finder:</h3>
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$allUsers = $userDatabase->findUsers($_SESSION['user']['id']);
					foreach($allUsers as $user){
						echo '<tr><td>'.$user['full_name'].'</td><td>'.$user['email'].'</td><td>';
						if (!$userDatabase->areFriends($_SESSION['user']['id'], $user['id'])){
				?>
							<form action="process.php" method="post">
								<input type="hidden" name="action" value="add_friend">
								<input type="hidden" name="user_id" value="<?= $user['id'] ?>">
								<input type="Submit" value="Add as Friend">
							</form>
				<?php
						} else {
							echo 'Friends';
						}
						echo '</td></tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>
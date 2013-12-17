<?php
	session_start();
	include_once("connection.php");
	include_once("country.php");

	$country = new Country();
?>

<html>
<head>
	<title>World</title>
	<link rel="stylesheet" type="text/css" href="global.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript">
	// $(document).ready(function(){
	// });
	</script>
</head>

<body>
	
	<form action="process.php" method="post">
		<input type="hidden" name="action" value="country">
		<label>Select Country: </label>
		<select name="country_id">
		<?php
			$country->createSelect();
		?>
		</select>
		<input type="submit" value="Check Info">
	</form>

	<?php
		if (isset($_SESSION['country'])){
	?>
			<h1>Country Information</h1>
			<hr>
			<p>Country: <?= $_SESSION['country']['name'] ?> </p>
			<p>Continent: <?= $_SESSION['country']['continent'] ?> </p>
			<p>Region: <?= $_SESSION['country']['region'] ?> </p>
			<p>Population: <?= $_SESSION['country']['population'] ?> </p>
			<p>Life Expectancy: <?= $_SESSION['country']['life_exp'] ?> </p>
			<p>Government: <?= $_SESSION['country']['govt'] ?> </p>
	<?php
		}
	?>
</body>
</html>

<?php
	$_SESSION = array();
?>
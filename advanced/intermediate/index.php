<?php
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
	$(document).ready(function(){
		$("#getCountry").on('submit', function(){
            $.post(
                $(this).attr('action'),
                $(this).serialize(),
                function(data){
                    $('#results').html(data.html);
                    console.log(data);
                }, 
                "json"
            );
            return false;
        });

        $("#country_select").change(function(){
        	$("#getCountry").submit();
        });
	});
	</script>
</head>

<body>
	
	<form id="getCountry" action="process.php" method="post">
		<input type="hidden" name="action" value="country">
		<label>Select Country: </label>
		<select id="country_select" name="country_id">
		<?php
			$country->createSelect();
		?>
		</select>
		<input type="submit" value="Check Info">
	</form>

	<div id="results"></div>
</body>
</html>
<?php
	include_once "Class/LocalizedString.php";
	//$lang = "IT";
	$lang = $_REQUEST['lang'];
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo LocalizedString("LIN", $lang); ?></title>
		<link rel="stylesheet" href="Plugin/font-awesome-4.0.3/css/font-awesome.min.css">
		<link rel="stylesheet" href="CSS/style.css"> 
	</head>
	
	<body>
		<form class = "central form">
			<div class = "left logInImage">
				<li class = "fa fa-lock centralFAIcon"></li>
			</div>
			<div class = "left inputDiv" >
				<input class = "input" type = "text" placeholder = "<?php echo LocalizedString("USR", $lang) ?>..." >
				<input class = "input" type = "password" placeholder = "<?php echo LocalizedString("PSS", $lang) ?>..." >
				<div class = "logInDiv">
					<a href = "" class = "link"><?php echo LocalizedString("LPS", $lang) ?></a>
					<input class = "button right noMargin" type = "button" value = "<?php echo LocalizedString("LIN", $lang); ?>">
					<input class = "button right" type = "button" value = "<?php echo LocalizedString("SUP", $lang) ?>">
				</div>
			</div>
		</form>
	</body>
</html>
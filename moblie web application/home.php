<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>DTails LLC</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="style.css" type="text/css"  />


</head>
<body>

<body>



<form class="form-signin  container" method="post" id="form-signin">
    	

		<label class="h1">welcome : <?php print($userRow['user_name']); ?></label>

 	<div class ="row">
	        <center><a href="reserve.php"><button type="button" class="homebuttons" >Reserve a spot</button></center>
	</div>	
	 <div class ="row">
	
		<center><a href="reservation.php"><button type="button" class="homebuttons" > View Reservation</button></a></center>
        </div>	
        <div class ="row">
		<li id="signout"><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
	</div>	
        </form>



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
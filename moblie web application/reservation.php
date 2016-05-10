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

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
</head>


<script type="text/javascript">

  var today = new Date();
  var expiry = new Date(today.getTime() + 30 * 24 * 3600 * 1000); // plus 30 days

  function setCookie(name, value)
  {
    document.cookie=name + "=" + escape(value) + "; path=/; expires=" + expiry.toGMTString();
  }

</script>

<script type="text/javascript">

  function storeValues(form)  
  {
    setCookie("field1", form.field1.value);
    setCookie("field2", form.field2.value);
    setCookie("field3", form.field3.value);
    setCookie("field4", form.field4.value);
    return true;
  }

</script>

<script type="text/javascript">

  if(field1 = getCookie("field1")) document.myForm.field1.value = field1;
  if(field2 = getCookie("field2")) document.myForm.field2.value = field2;
  if(field3 = getCookie("field3")) document.myForm.field3.value = field3;
  if(field4 = getCookie("field4")) document.myForm.field4.value = field4;

</script>

<script type="text/javascript">

  function clearCookies()
  {
    deleteCookie("field1");
    deleteCookie("field2");
    deleteCookie("field3"); 
    deleteCookie("field4");
    alert('Your reservations have been deleted!');
    location.reload();
  }
  
</script>

<script type="text/javascript">

  var expired = new Date(today.getTime() - 24 * 3600 * 1000); // less 24 hours

  function deleteCookie(name)
  {
    document.cookie=name + "=null; path=/; expires=" + expired.toGMTString();
  }
  
</script>

<script type="text/javascript">

  function getCookie(name)
  {
    var re = new RegExp(name + "=([^;]+)");
    var value = re.exec(document.cookie);
    return (value != null) ? unescape(value[1]) : null;
  }
  
</script>
</head>

<body>







<form class="form-signin  container" method="post" id="form-signin">



<ul class="list-group">
  <li class="list-group-item">Reservation 1: <script type="text/javascript">document.write(getCookie("field1"));</script></li>
  <li class="list-group-item">Reservation 2: <script type="text/javascript">document.write(getCookie("field2"));</script></li>
  <li class="list-group-item">Reservation 3: <script type="text/javascript">document.write(getCookie("field3"));</script></li>
  <li class="list-group-item">Reservation 4: <script type="text/javascript">document.write(getCookie("field4"));</script></li>
</ul>


	
	
         <div class ="row">
		<center><input type="button" class="homebuttons" onclick="clearCookies();" value="Clear Reservation" onsubmit="return storeValues(this);" ></center>
        </div>	
     	 <div class ="row">
		<center><a href="home.php"><button type="button" class="homebuttons">Back</button></a></center>
        </div>	
</form>


  



</body>
</html>
<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('home.php');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
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




	
     
        
 <form class="form-signin fullHeight container" method="post" id="login-form">
      
       
        
        <div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
			}
	?>
        </div>
        
        <h1 class="h1style" id="maintoph1">Username</h1>
        <div class="form-group">
        <input type="text" class="form-control" name="txt_uname_email"  required />
        <span id="check-e"></span>
        </div>
        <h1 class="h1style">Password</h1>
        <div class="form-group">
        <input type="password" class="form-control" name="txt_password"  />
        </div>
       
   
     <div class ="row">
            <center><button id="loginBTN" class="buttons" type="submit" name="btn-login" >LOGIN</button></center>
      </div>
      <div class = "row">
            <center><a href="sign-up.php"><button class="buttons" type="button">SIGN UP</button></a></center>
      </div>
 </form>

  
    


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>


	
</body>
</html>
<?php
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['btn-signup']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);	
	
	if($uname=="")	{
		$error[] = "provide username !";	
	}
	else if($umail=="")	{
		$error[] = "provide email id !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address !';
	}
	else if($upass=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($upass) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['user_name']==$uname) {
				$error[] = "sorry username already taken !";
			}
			else if($row['user_email']==$umail) {
				$error[] = "sorry email id already taken !";
			}
			else
			{
				if($user->register($uname,$umail,$upass)){	
					$user->redirect('sign-up.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
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

<form class="form-signin  container" method="post" id="login-form">
        
            <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                 </div>
                 <?php
			}
			?>
			
	   <h1 class="h1style">Name</h1>
            <div class="form-group">
            <input type="text" class="form-control"  />
            </div> 	
            
            <h1 class="h1style">Email Address</h1>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_umail" " value="<?php if(isset($error)){echo $umail;}?>" />
            </div>
            		
	   <h1 class="h1style">Username</h1>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_uname"  value="<?php if(isset($error)){echo $uname;}?>" />
            </div>

			<h1 class="h1style">Password</h1>
            <div class="form-group">
            	<input type="password" class="form-control" name="txt_upass"  />
            </div>
			<h1 class="h1style">Confirm Password</h1>
			<div class="form-group">
            	<input type="password" class="form-control" name="txt_upass2"  />
            </div>
            <div class="form-group">
            	<button type="submit" class="btn btn-primary buttons" name="btn-signup">
                	SIGN UP
                </button>
            </div>
     
        </form>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
 <title>Prongo-Login</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <meta name="viewport" content="width=device-width , initial-scale=1"> 
 <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
</head>
<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "prongo";
  $conn = mysqli_connect($server,$username,$password,$database);
  if($conn)
  {
	  echo "database connected";
	  if(isset($_POST['login_submit']))
	  {
	    $login_email = $_POST['login_email'];
		$login_password = $_POST['login_password'];
		$login_sql = "select * from user_table where email_user = '$login_email' and password_user='$login_password'";
		$user_authentication = mysqli_query($conn,$login_sql);
		if($user_authentication)
		{
		  $num_rows = mysqli_num_rows($user_authentication);
		  if($num_rows>0)
		  {
			 while($num_rows = mysqli_fetch_array($user_authentication))
				 {
				   $name  = $num_rows['name_user'];
				 }
			   echo "logged in";
			   echo $login_email;
		       echo $login_password; 
			   session_start();
               $_SESSION['login'] = "1";
			   $_SESSION['email'] = $login_email;
			   $_SESSION['name'] = $name;
			   //$_SESSION['name'] = ''; 
               header ("Location: user_dashboard.php");  
		  }
		  else
		  {
			  echo "wrong username or password!!";
              $_SESSION['login'] = "";			  
		  }
		}
	  }
  }	  
?>
<style>
 body{
	  background: url("30172-NXV2UL.jpg") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
   background-size: cover; 
  }
  div.main_heading
  {
	  font-family:Fredoka One;
      text-align:center;
      color:;
      font-size:50px;
      height:100px	  
  }
  div.sub_heading{
       font-family:Fredoka One;
	   text-align:center;
	   font-size:20px;
	   margin-top:50px;
  }
  form {
	  font-family: Fredoka One;
  }
  div.icon {
	   display:flex;
	   align-items:center;
	   font-size:24px;
  }
</style>
<body>
 <div class="container">
    <div class="row">
     <div class="col-xs-2 icon" style="text-align:center;">
	   <a href="prongo.html"> 
	   <i class="fa fa-angle-double-left"  style="font-size:24px;">
	   </i>
	   </a>
	 </div>
     <div class="col-xs-8">	 
	  <div class="main_heading">Prongo</div> 
	 </div>
	 <div class="col-xs-2">
	 </div>
	</div>
	<div class="sub_heading">
	  Login
	</div>
	<div class="row" style="margin-top:50px">
	<div class="col-xs-12 col-md-2">
	</div>
	<div class="col-md-8">
	<form role="form" action="" method="post">
	  <div class="form-group">
	   <label for="login_email">Email</label>
	    <input type="email" id="login_email" name="login_email" class="form-control" placeholder="Enter your email">
       </label>	 
	  </div>
	  <div class="form-group">
	   <label for="login_password">Password</label>
	    <input type="password" id="login_password" name="login_password" class="form-control" placeholder="Enter your password">
       </label>	 
	  </div>
      <div class="form-group">
	    <button type="submit" id="login_submit" name="login_submit" class="form-control" style="">Login</button>
      </div>	  
	</form>
	</div>
	<div class="col-xs-12 col-md-2">
	</div>
    </div>
	<div class="container">
	<div class="" style="font-family:Fredoka One;font-size:20px;margin-top:50px;"> 
	   Or login with
	</div>
	<div class="row icon" style="margin-top:50px;">
	<a href="#">
	  <i class="fa fa-facebook" aria-hidden="true"></i>
	</a>
	<div style="width:40px">
	</div>
	<a href="#">
	  <i class="fa fa-google" aria-hidden="true"></i>
	</a>
	</div>
	</div>
</body>
</html>
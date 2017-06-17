<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "prongo";
  $conn = mysqli_connect($server,$username,$password,$database);
  if($conn)
  {
	  echo "database connected";
	  if(isset($_POST['signup_submit']))
	  {
		$signup_name = $_POST['signup_name'];		
	    $signup_email = $_POST['signup_email'];
		$upload_table_name = $signup_name."_uploads_table";
		echo $upload_table_name;
		$signup_password = $_POST['signup_password'];
		$target_dir = "profile_photo/";
        $target_file = $target_dir . basename($_FILES["signup_photo"]["name"]);
		echo $target_file;
        $signup_photo = $target_file;
		echo $_FILES["signup_photo"]["tmp_name"];
		
        if (move_uploaded_file($_FILES["signup_photo"]["tmp_name"], $target_file)) 
		{
        echo "The file ". basename( $_FILES["signup_photo"]["name"]). " has been uploaded.";
		$insert_into_user_table = "INSERT INTO user_table (name_user, email_user, password_user, profilephoto_user) VALUES ('$signup_name', '$signup_email', '$signup_password', '$signup_photo')";
        if(mysqli_query(mysqli_connect($server,$username,$password,$database),$insert_into_user_table))
		{
			echo "query executed successfully";
			$create_user_upload_table = "create table $upload_table_name(project_title varchar(20),project_technology varchar(20),project_description varchar(200),project_file_path varchar(50))";
			if(mysqli_query($conn,$create_user_upload_table))
			{
				echo "table created ";
			    header ("Location: login.php");	
			}
			else
			{
				 echo "table not created";
			}
			  
		}
		else
		{
			echo "not executed";
		}
        } 
	else 
	{
        echo "Sorry, there was an error uploading your file.";
    }
   }
}

   
?>
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
<style>
 body{
	  background-color:#F98931; 
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
  div.icon_left {
	   display:flex;
	   align-items:center;
	   font-size:24px;
  }
</style>
<body>
 <div class="container">
    <div class="row">
     <div class="col-xs-2 icon_left" style="text-align:center;">
	   <a href="index.php"> 
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
	  Signup
	</div>
	<div class="row" style="margin-top:50px">
	<div class="col-xs-12 col-md-2">
	</div>
	<div class="col-md-8">
	<form role="form" action="" method="post" enctype="multipart/form-data">
	  <div class="form-group">
	   <label for="signup_name">Name</label>
	    <input type="text" id="signup_name" name="signup_name" class="form-control" placeholder="Enter your name">
	  </div>
	  <div class="form-group">
	   <label for="signup_email">Email</label>
	    <input type="email" id="signup_email" name="signup_email" class="form-control" placeholder="Enter your email">
	  </div>
	  <div class="form-group">
	   <label for="login_password">Password</label>
	    <input type="password" id="signup_password" name="signup_password" class="form-control" placeholder="Enter your password">	 
	  </div>
	  <div class="form-group">
       <label for="signup_photo">Choose a profile photo</label> 
		<input type="file" class="form-control" id="signup_photo" name="signup_photo">
	  </div>
      <div class="form-group">
	    <button type="submit" id="signup_submit" name="signup_submit" class="form-control" style="">Signup</button>
      </div>
      	  
	</form>
	</div>
	<div class="col-xs-12 col-md-2">
	</div>
 </div>
</body>
</html>
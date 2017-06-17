<!DOCTYPE html>
<html>
  <head>
     <title>Dashboard</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width , initial-scale=1"> 
     <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
	 <link rel="shortcut icon" href="../favicon.ico">
	 <link rel="stylesheet" type="text/css" href="css/normalize.css" />
	 <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
	 <link rel="stylesheet" type="text/css" href="css/demo.css" />
	 <link rel="stylesheet" type="text/css" href="css/set1.css" />

  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  </head>
  <?php
   session_start();
   if(!$_SESSION['login'])
   {
     header('Location:login.php');
   }
   else
   {
    echo $_SESSION['name'];
    echo $_SESSION['email'];
	$upload_table_name = $_SESSION['name']."_uploads_table";
	echo $upload_table_name;
	$email = $_SESSION['email'];
	$name = $_SESSION['name'];
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "prongo";
    $conn = mysqli_connect($server,$username,$password,$database);
    if($conn)
    {
	  //echo "database connected";
	  $sql_extract_data = "select * from user_table where email_user = '$email'";
	  $result = mysqli_query($conn,$sql_extract_data);
	  if(isset($_POST['project_submit']))//project upload  
	  {
	   echo "post";	  
	   $project_title = $_POST['project_title'];
	   echo $project_title;
       $project_technology = $_POST['project_technology'];
	   $project_abstract = $_POST['project_abstract'];
	   $project_courses = $_POST['project_courses'];
	   $target_dir = "project_uploads/";
       $target_file = $target_dir . basename($_FILES["project_upload"]["name"]);
	   $project_upload = $target_file;
	   if (move_uploaded_file($_FILES["project_upload"]["tmp_name"], $target_file)) 
		{
        echo "The file ". basename( $_FILES["project_upload"]["name"]). " has been uploaded.";
		$insert_into_upload_table = "INSERT INTO $upload_table_name(project_title, project_technology, project_abstract,project_courses, project_file_path) VALUES ('$project_title', '$project_technology', '$project_abstract','$project_courses' ,'$project_upload')";
	    $insert_into_common_upload_table = "INSERT INTO project_upload_table(user_email,user_name,project_title, project_technology, project_abstract,project_courses, project_file_path) VALUES('$email','$name','$project_title', '$project_technology', '$project_abstract','$project_courses','$project_upload')";
		if(mysqli_query($conn,$insert_into_upload_table))
		{
		  echo "project uploaded successfully";
		}
		else
		{
	      echo "not uploaded";		 
		}
		if(mysqli_query($conn,$insert_into_common_upload_table))
		{
		  echo "project uploaded successfully in common table";
		}
		else
		{
	      echo "not uploaded";		 
		}
		
        }
       }
	   $sql_extract_projects = "SELECT * FROM project_upload_table";
	   $result_project = mysqli_query($conn,$sql_extract_projects);
	   
	   
	   
	}
   }
   
  ?>
  <style>
   body{
	  background: url("12153-NOC0JL.jpg") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
   background-size: cover;
  }
  div.main_heading
  {
	  font-family:Fredoka One;
      text-align:center;
      font-size:50px;
      height:100px;
      	  
  }
  div.sub_heading{
       font-family:Fredoka One;
	   text-align:center;
	   font-size:20px;
	   margin-top:50px;
  }
  form {
	
  }
  div.icon{
    width: 30px;
    height: 5px;
    background-color: black;
    margin: 6px 0;
	 display:flex;
    align-items:center;
}
  div.center{
  position:absolute; /*it can be fixed too*/
        left:0; right:0;
        top:0; bottom:0;
        margin:auto;

        /*this to solve "the content will not be cut when the window is smaller than the content": */
        max-width:100%;
        max-height:100%;
        overflow:auto;
}
li.list{
	font-family:Fredoka One;
	color:black;
}
div.profile_photo{
	height:100px;
	width:100px;
	border-radius:100%;
    display:flex;
    align-items:center;
	box-shadow: 3px 3px 3px #888888;
}

		div.submit{
			text-align: center;
		}
        
		label{
         font-size:20px;
         color:black;
        }
	   div.abc
	   {
		   padding:50px;
           background-color:#FF5722;
           opacity:0.8;		   
	   }	   
	   div.project_card
      {
       padding:30px;
	   background-color:#FF5722;
	   margin-bottom:40px;
	   box-shadow: 10px 10px 5px #888888;
	   opacity:0.8;
	   color:black;
      }
      div.heading_card
      {
       font-size:30px;
      }
	  div.header{
      margin-top:40px;
      opacity:0.8;
      background-color:#FF5722;
      box-shadow:10px 10px 5px #888888;
      font-family:Fredoka One;
	  padding:10px;
      }
	  li.tabs{
		  font-size:25px;
		  color:black;
	  }
  </style>
  <body>
    <div class="" style="margin-top:40px">
	<div class="row header">
	<?php while($row = mysqli_fetch_assoc($result)): ?>
	<div class="col-xs-12 col-md-4">
      <div class="center-block profile_photo row" >
        <img src="<?php echo $row['profilephoto_user']; ?>" style="height:100px;width:100px;border-radius:100%" class="img-responsive">
	  </div>	  
	</div>
    <div class="col-xs-12 col-md-4 " style="text-align:center;">
	  <div class="main_heading">
	  <!--<div style="text-align:center;color:black">Prongo</div>-->
	  </div> 
	</div>
	<div class="col-xs-12 col-md-4">
        <div class="col-xs-12 col-md-4 dropdown" id="mydiv" style="height:100px;margin:auto;width:100%;display:block">
	     <div class="" style="margin-left:50%;width:100%;display:flex;align-items:center;">
          <div type="button" id="button" class="dropdown-toggle center" data-toggle="dropdown" data-target="#burger" style="margin-top:8%;margin-left:47%;onhover:pointer">
             <div class="icon"></div>
             <div class="icon"></div>
             <div class="icon"></div>                     
          </div>
             <ul class="dropdown-menu" style="width:100%;text-align:center;background-color:rgba(255,255,255,0);opacity:1;">
               <li class="list"><a href="logout.php">Logout</a></li><br>
               <li class="list"><a href="prongo.html">Home</a></li><br>
               <li class="list"><a href="#">Blog</a></li><br>
             </ul>
         </div>
        </div>	      
	</div>
	<?php endwhile; ?>
    </div>
	<div class="container" style="margin-top:200px;">
	<ul class="nav nav-tabs row">
    <li class="active tabs col-xs-6"><a data-toggle="tab" color="red" href="#home">Upload</a></li>
    <li class="tabs col-xs-6"><a data-toggle="tab" href="#menu1">Download</a></li>
    
    </ul>

  <div class="tab-content" >
    <div id="home" class="tab-pane fade in active abc" style="opacity:0.8">
      <div class="row" style="text-align:center;font-family:Fredoka One;font-size:25px;margin-bottom:40px;">
      Upload your projects,script,documentation etc here
     </div>  
  
  <form role="form" action="" method="post" enctype="multipart/form-data">
     <div class="form-group row">
	    <label for="project_title" class="col-xs-12 col-lg-4">Project title</label>
		<input type="text" class="col-xs-12 col-lg-8 form-control" id="project_title" name="project_title" placeholder="Enter project title">
	 </div>
	  <div class="form-group row">
	    <label for="project_abstract" class="col-xs-12 col-lg-4">Project abstract</label>
		<textarea class="col-xs-12 col-lg-8 form-control" rows="6" id="project_abstract" name="project_abstract"  placeholder="Enter project abstract"></textarea>
	 </div>
	  <div class="form-group row">
	    <label for="project_technology" class="col-xs-12 col-lg-4">Project technologies</label>
		<input type="text" class="col-xs-12 col-lg-8 form-control" id="project_technology" name="project_technology"  placeholder="Enter used technologies">
	 </div>
	  <div class="form-group row">
	    <label for="project_courses" class="col-xs-12 col-lg-4">Courses and branches that can use this project</label>
		<input type="text" class="col-xs-12 col-lg-8 form-control" id="project_courses" name="project_courses"  placeholder="Enter courses and braches like cs,it,be,mca...">
	 </div>
	  <div class="form-group row">
	    <label for="project_upload" class="col-xs-12 col-lg-4">Choose file for your project</label>
		<input type="file" class="col-xs-12 col-lg-8 form-control" id="project_upload" name="project_upload"  placeholder="select file .zip or .xar folder of your project">
	 </div>
	 <div class="form-group row">
		<input type="submit" class="col-xs-12 form-control" id="project_upload" name="project_submit"  placeholder="select file .zip or .xar folder of your project">
	 </div>
	 
  </form>
    </div>
    <div id="menu1" class="tab-pane fade" style="padding:50px">
    <div class="row" style="text-align:center;font-family:Fredoka One;font-size:25px;margin-bottom:40px;">
      <div class="col-xs-12"> Download projects,script,documentation etc here </div>
     </div>
    <?php while($row = mysqli_fetch_assoc($result_project)): ?>	
    <div class="project_card">
    <div class="heading_card" data-key1="<?php echo $row['user_email']; ?>" data-key2="<?php echo $row['project_title']; ?>" onclick="project_details(this)" >
     <div class="row">
	    
		<div class="col-xs-12 col-lg-4">
		  Title :
        </div>
		<div class="col-xs-12 col-lg-8">
		  <?php echo $row['project_title']; ?> 
        </div>
        		
	 </div>
	 <div class="row">
	    
		<div class="col-xs-12 col-lg-4">
		  Technologies :
        </div>
		<div class="col-xs-12 col-lg-8">
		  <?php echo $row['project_technology']; ?>
        </div>
        		
	 </div>
	 <div class="row" >
	    
		<div class="col-xs-12 col-lg-4">
		  Developer :
        </div>
		<div class="col-xs-12 col-lg-8">
		  <?php echo $row['user_name']; ?> 
        </div>
        		
	 </div>
	 
	 <button type="button" class="btn-primary" onclick="project_details()" style="margin-top:20px;">Details</button>
	
   </div>
   </div>
   <?php endwhile; ?>
	  
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
	</div>
    </div>
	<div style="margin-top:50px">
	</div>
	<script>
	  function project_details(x)
	  {
	     var key1 = x.getAttribute("data-key1");
         var key2 = x.getAttribute("data-key2");
         window.location.href = "project_description.php?key1="+key1+"&key2="+key2;		 
	  }
	</script>
  </body>
</html>
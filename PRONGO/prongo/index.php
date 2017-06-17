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
   }
?>
<!DOCTYPE html>
<html>
<head>
  <title> Prongo-Project on the go</title>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width , initial-scale=1"> 
  <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
</head>
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
      color:;
      font-size:50px;
      height:100px	  
  }
  div.sub_heading{
       font-family:Fredoka One;
	   text-align:center;
	   font-size:20px;
  }
  div.icon{
    width: 30px;
    height: 5px;
    background-color: black;
    margin: 6px 0;
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
div.card{
  height:200px;
  padding:30px;
  background-color:yellow;
  box-shadow: 10px 10px 5px #888888;
  margin-top:20px;
  display:flex;
  align-items:center;
  text-align:center;
  font-family:Fredoka One;
  font-size:30px;
}
li.list{
	font-family:Fredoka One;
}
div.banner{
  background-color:blue;
}
</style>
<body>
  <div class="row">
    <div class="col-xs-12 col-md-8 banner" >
	  <div class="main_heading">Prongo</div> 
	</div>
	<div class="col-xs-12 col-md-4">
        <div class="col-xs-12 col-md-4 dropdown" id="mydiv" style="height:100px;">
	     <div class="" style="margin-left:50%;width:100%;">
          <div type="button" id="button" class="dropdown-toggle center" data-toggle="dropdown" data-target="#burger" style="margin-top:9%;margin-left:47%;onhover:pointer">
             <div class="icon"></div>
             <div class="icon"></div>
             <div class="icon"></div>                     
          </div>
             <ul class="dropdown-menu" style="width:100%;text-align:center;background-color:rgba(255,255,255,0);opacity:1;">
               <li class="list"><a href="login.php">login</a></li><br>
               <li class="list"><a href="signup.php">signup</a></li><br>
               <li class="list"><a href="#">Blog</a></li><br>
             </ul>
         </div>
        </div>	      
	</div>
  </div>
 
  <!--<div class="row container" style="margin-top:100px;" >
     <div class="col-xs-12 col-md-2">
	   
     </div>
     <div class="col-xs-12 col-md-3 card" id="card" onmouseover="hover_card()" onmouseout="exit_card()"> 
       <img src="Upload.png" class="img-responsive center-block" style="">     
	</div>
	 <div class="col-xs-12 col-md-2">
	  
	 </div>
     <div class="col-xs-12 col-md-3 card " style="align-item:center" style="padding:30px">
        <img src="Download.png" class="img-responsive center-block" style="">
	 </div>
 	 <div class="col-xs-12 col-md-2">
             
	 </div> 
  </div>-->
  <div style="margin-bottom:400px">
  </div>
</body>
<script>
</script>
</html>
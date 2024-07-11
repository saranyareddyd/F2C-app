<html>  
<head>  
    <title>Login Form</title>  
    
</head>
<?php
session_start();
$connection=mysqli_connect("localhost","root","","login");
if(!$connection)
{
    echo("connection terminated");
}
if(isset($_COOKIE['emailid']) && isset($_COOKIE['password']))
{
  $emailid = $_COOKIE['emailid'];
  $password = $_COOKIE['password'];
}
else
{
  $emailid = $password ="";
}
if(isset($_REQUEST['login']))
{
  $email = $_REQUEST['email'];
  $pwd = $_REQUEST['pwd'];
  $select_query = mysqli_query($connection,"select * from stud where email='$email' and password='$pwd'");
  $res = mysqli_num_rows($select_query);
  echo($res);
  if($res>0)
  {
    $data = mysqli_fetch_array($select_query);
    $name = $data['name'];
    $_SESSION['name'] = $name;
    if(isset($_REQUEST['rememberMe']))
    {
      setcookie('emailid',$_REQUEST['email'],time()+60*60);//1 hour
      setcookie('password',$_REQUEST['pwd'],time()+60*60); //1 hour
    }
    else
    {
      setcookie('emailid',$_REQUEST['email'],time()-10);//10 seconds
      setcookie('password',$_REQUEST['pwd'],time()-10); //10 seconds
    }
    header('location:http://localhost/session/dashboard.php');
  }
  else  {
    $msg = "Please enter valid Emailid or Password.";
  }
}
?>
 <body>  
    <div class="container">  
    <div class="table-responsive">  
    <h3 align="center">Login Form</h3><br/>
    <div class="box">
     <form id="validate_form" method="post" >  
       <div class="form-group">
       <label for="email">Email</label>
       <input type="text" name="email" id="email" placeholder="Enter Email" required 
       data-parsley-type="email" data-parsley-trigg
       er="keyup" class="form-control" value="<?php echo $emailid; ?>"/>
      </div>
      <div class="form-group">
       <label for="password">Password</label>
       <input type="password" name="pwd" id="pwd" placeholder="Enter Password" required  data-parsley-trigger="keyup" class="form-control" value="<?php echo $password; ?>"/>
      </div>
     <input type="checkbox" name="rememberMe" id="rememberMe"> <label for="rememberMe">Remember me</label>
      <div class="form-group">
       <input type="submit" id="login" name="login" value="LogIn" class="btn btn-success" />
       </div>
       
       <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
     </form>
     </div>
   </div>  
  </div>
 </body>  
</html>  

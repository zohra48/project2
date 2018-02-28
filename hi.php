
<?php 
session_start();

$dbcon=mysqli_connect("localhost","root","","zohra");
//mysqli_select_db($dbcon,"test");
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $userpass=$_POST['password'];

    $row="SELECT * from member WHERE username='".$username ."'AND password='".$userpass."'";

    $run=mysqli_query($dbcon,$row);

    if(mysqli_num_rows($run))

    {
        echo "<script>window.open('address.php','_self')</script>";

        $_SESSION['username']=$username;

    }
    else
    {
        echo "<script>alert('Username or password is incorrect!')</script>";
    }
}


if(isset($_POST['signup']))
{
    $username=$_POST['username'];//same
  $password=$_POST['password'];//same


   if($username=='')
    {
        echo"<script>alert('Please enter the username')</script>";
exit();
    }

     if($password=='')
    {
        echo"<script>alert('Please enter the password')</script>";
    exit();
    }
    $run_query=mysqli_query($dbcon,"SELECT * from member WHERE username='$username'");

    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('Email $username is already exist in our database, Please try another one!')</script>";
exit();
    }
    if(mysqli_query($dbcon,"INSERT INTO member (username,password) VALUES ('$username','$password')"))
    {
        echo"<script>window.open('hi.php','_self')</script>";
    }

}

 ?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Addressbook</title>
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
 <body> 
 <nav class="navbar navbar-default">
    <div class="topnav" style="background-color: #ddd;padding: 50px">
 <nav class="navbar navbar-default">
    <div class="navbar-header" style="background-image: url('im.png');padding: 100px">
    <h1> student log in form </h1>
    <form action="hi.php" method="post" style="font-size:20px">
            <label for="username">Username </label>
            <input type="username" name="username" id="username" placeholder="Enter your name"/>

            <label>Password </label>
            <input type="password" name="password" placeholder="***********" />
            
            <input type="submit" name="login" value="Login" /> 
        
    </form>
                        <div>
                            <form  action="hi.php" method="post" style="font-size:20px"> 
                                <h1> Sign up </h1>
                                 <p>
                                     Not a member yet ?
                                </p>
                                <p> 
                                    <label>Username </label>
                                    <input name="username" required="required" type="username" placeholder="Enter your name"/>
                                </p>
                                <p> 
                                    <label>Password </label>
                                    <input name="password" required="required" type="password" placeholder="***********"/>
                                </p>
                                <p class="signin button"> 
                                    <input type="submit" name="signup" value="Sign up"/> 
                                </p>
                            </form>
    </div>  
    </nav>  
    
 </body> 
 </html> 
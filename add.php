
 <html>
 	<head>
 		<title>Address Book</title>
 	</head>
 	<body>
 	 <nav class="navbar navbar-default">
    <div class="topnav" style="background-color: #ddd;padding: 50px">
    </div>
 <nav class="navbar navbar-default">
    <div class="navbar-header" style="background-image: url('im.png');padding: 150px">
    
 <h2>Add Contact</h2>
 <p> 
 <form action="add.php" method="post"> 
 <table>
 <tr><td>Name:</td><td><input type="text" name="name" /></td></tr>
 <tr><td>Nick-name:</td><td><input type="text" name="nick" /></td></tr> 
 <tr><td>Phone:</td><td><input type="text" name="phone" /></td></tr> 
 <tr><td>Address:</td><td><input type="text" name="addres" /></td></tr> 
  <tr><td>Date of birth:</td><td><input type="text" name="date" /></td></tr>
 <tr><td colspan="2" align="center"><input type="submit" name="add"/></td></tr>
 </table> 
 </form> <p>

</div>  
    </nav>  
    
 	</body> 
 </html> 
  <?php
  session_start();
 if(!$_SESSION['username'])
{

    header("Location: hi.php");//redirect to login page to secure the welcome page without login access.
} 
 
 $con=mysqli_connect("localhost", "root", "","zohra")or die(mysql_error()); 
 mysqli_select_db($con,"zohra")or die(mysql_error());
if(isset($_POST['add']))
{
 $name=$_POST['name'];
 $nick=$_POST['nick'];
 $phone=$_POST['phone'];
  $addres=$_POST['addres'];
 $date=$_POST['date'];
 $query = "INSERT INTO address (name,nick,phone,addres,date) VALUES ('$name','$nick','$phone','$addres','$date')";
 //echo $query;
  $sql=mysqli_query ($con,$query);   
  echo "<script>window.open('address.php','_self')</script>";
 }
 //mysqli_close($con);  
 	?>
<ht2ml>
 	<head>
 		<title>Address Book</title>
 	</head>
 	<body>
 	 <nav class="navbar navbar-default">
    <div class="topnav" style="background-image: url('im.png');padding: 150px">
    <div style= margin:20px;><a href="add.php"target="_blank">Add Contact</a>
    </div>
 <nav class="navbar navbar-default">
    <div class="navbar-header" style="background-color: #ddd;padding: 10px">
 
 	<?php
 // Connects to your Database
session_start();
 if(!$_SESSION['username'])
{

    header("Location: hi.php");//redirect to login page to secure the welcome page without login access.
} 
 
 $con=mysqli_connect("localhost", "root", "","test")or die(mysql_error()); 
 mysqli_select_db($con,"test")or die(mysql_error());
if(isset($_GET['mode']))
$mode= $_GET['mode'];
else
$mode="";	
if(isset($_GET['name']))
$name= $_GET['name'];
else
$name="";	

if(isset($_GET['nick']))
$nick= $_GET['nick'];
else
$nick="";	
if(isset($_GET['phone']))
$phone= $_GET['phone'];
else
$phone="";	
if(isset($_GET['addres']))
$addres= $_GET['addres'];
else
$addres="";

if(isset($_GET['date']))
$date= $_GET['date'];
else
$date="";
if(isset($_GET['id']))
$id= $_GET['id'];
else
$id="";	
$self = $_SERVER['PHP_SELF'];

//echo $self;

 if ( $mode=="edit") 
 { 
 Print '<h2>Edit Contact</h2> 
 <p> 
 <form action=';
 echo $self; 
 Print '
 method=GET> 
 <table> 
 <tr><td>Name:</td><td><input type="text" value="'; 
 Print $name; 
 print '" name="name" /></td></tr> 
 
  <tr><td>Nick-name:</td><td><input type="text" value="'; 
 Print $nick; 
 print '" name="nick" /></td></tr>
 <tr><td>Phone:</td><td><input type="text" value="'; 
 Print $phone; 
 print '" name="phone" /></td></tr> 
 <tr><td>Address:</td><td><input type="text" value="'; 
 Print $addres; 
 print '" name="addres" /></td></tr>
 <tr><td>Date of birth:</td><td><input type="text" value="'; 
 Print $date; 
 print '" name="date" /></td></tr> 

 <tr><td colspan="2" align="center"><input type="submit" /></td></tr> 
 <input type=hidden name=mode value=edited> 
 <input type=hidden name=id value='; 
 Print $id; 
 print '> 
 </table> 
 </form> <p>'; 
 } 
 
 if ( $mode=="edited") 
 { 
  $query = "UPDATE address SET name='$name', nick='$nick', phone='$phone',addres='$addres',date='$date' WHERE id=$id";
mysqli_query ($con,$query); 
Print "Data Updated!<p>"; 
 } 

if ( $mode=="remove") 
 {
 mysqli_query ($con,"DELETE FROM address where id=$id");
 Print "Entry has been removed <p>";
 }

  $data = mysqli_query($con,"SELECT * FROM address ORDER BY name ASC") 
 or die(mysql_error()); 
 Print "<h2>Address Book</h2><p>"; 
 Print "<table border cellpadding=3>"; 
 Print "<tr><th width=100>Name</th><th width=100>Nick-name</th><th width=200>Phone</th><th width=100>Address</th><th width=100>Date of birth</th><th width=100 colspan=2>Admin</th></tr>";  
 while($info = mysqli_fetch_array( $data )) 
 { 
Print "<tr><td>".$info['name'] . "</td> "; 
 Print "<td>".$info['nick'] . "</td>"; 
 Print "<td>".$info['phone'] . "</td>" ;  

  Print "<td>".$info['addres'] . "</td>";  
  Print "<td>".$info['date'] . "</td>";
  Print "<td><a href=" .$_SERVER['PHP_SELF']. "?id=" . $info['id'] ."&name=" . $info['name'] . "&nick=" . $info['nick'] ."&phone=" . $info['phone'] ."&addres=" . $info['addres']."&date=" . $info['date'] ."&mode=edit>Edit</a></td>"; Print "<td><a href=" .$_SERVER['PHP_SELF']. "?id=" . $info['id'] ."&mode=remove>Remove</a></td></tr>"; 
 
 } 
 Print "</table>"; 
 
//Print "<td colspan=5 align=right><a href=" .$_SERVER['PHP_SELF']. "?mode=add>Add Contact</a></td>";
?>
</div>  
    </nav>  
    
 	</body> 
 </html> 

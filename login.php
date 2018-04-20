<?php
session_start();
?>
<html>
<head>
<title>php</title>
</head>
<H1 ALIGN=CENTER><FONT COLOR=YELLOW>ATM MACHINE</FONT></H1>
<h2><marquee>welcome to atm portal.24x7 service is available...</marquee></h2>
<body BGCOLOR=darkslateBLUE><br><br><br>
<h2 align=center> <font color="chartreuse">ENTER YOUR DETAILS</font></h2>
<form align=center action = "login.php" method = "post">
<table align=center>
<tr>
<td><b><font size=5 color=ivory>Username:</td>  <td><input type="text" name="username"></td></tr>
<tr>
<td><b><font size=5 color=ivory>Password:</td> <td> <input type="password" name="password"></td></tr>
<tr>
<td><b><font size=5 color=ivory>Enter Pin:</td> <td> <input type="password" name="pin"></td></b></tr>
</table>
<input type ="submit" style="background-color:orange; height:40px;width:80px" name = "submit" value = "submit">
</form>
<h2 align=center><?php   echo @$_GET['logout'];?><h2>
<h2 align=center><?php   echo @$_GET['error'];?><h2>
</body>
</html>
<?php
mysql_connect("localhost","root","");
mysql_select_db("atm");
?>

<?php

if(isset($_POST['submit']))
{  


    $searchu = $_SESSION['$username']=$_POST['username'];
	$searchp = $_POST['password'];
	$searchpin = $_POST['pin'];
	
	if($searchu=='' or $searchp=='' or $searchpin==''){
	 echo "<script>alert('please fill all fields')
	window.location.assign('login.php');
	 </script>";
		
		
}
	$query = "select * from user where username='$searchu' AND password='$searchp' AND pin='$searchpin'";
    $run = mysql_query($query);
   while($row = mysql_fetch_array($run))
   {
	    $username = $row['username'];
	    $password = $row['password'];
		$pin= $row['pin'];
			
   }
    if($searchu==$username && $searchp==$password && $searchpin==$pin){
    echo "<script>alert('WELCOME');
	window.open('active.php?logged=you are logged in succesfully!!','_self');
	     </script>";
	}
	else
	{
		echo "<script>alert('check username or password');
		window.location.assign('login.php');
		     </script>";
	}
}



?>

<?php
session_start();
if(!$_SESSION['$username']){
header('location:login.php?error=you are not a user');
}
?>
 
<html>
<head>
<title>php</title>
</head>
<H1 ALIGN=CENTER><FONT COLOR=YELLOW>ATM MACHINE</FONT></H1>
<b><font color="chartreuse">WELCOME:<font size='5' color='ivory'><?php echo  $_SESSION['$username'];?></font></b>
<h2 align=right><a href='logout.php'><font color="chartreuse">Logout</FONT></a></h2>
<body BGCOLOR=darkslateBLUE><br><br><br>
<form align=center action = "active.php" method = "POST">
<table align=center>
<tr>
<td ><input type ="submit" style="background-color:orange; height:80px;width:160px; font-size:18" name = "withdraw"  value=WITHDRAW> </td><BR>
<td><input type ="submit" style="background-color:orange; height:80px;width:160px; font-size:18" name = "balance"  value='DEPOSIT'></td></tr><BR>
<tr><td><input type ="submit" style="background-color:orange; height:80px;width:160px; font-size:18" name = "TRANSFER"  value=TRANSFER></td><BR>
<td><input type ="submit" style="background-color:orange; height:80px;width:160px; font-size:18" name = "CHANGE PIN"  value='CHANGE PIN'></td></tr>
</table>
</form>
</body>
</html>
<?php
mysql_connect("localhost","root","");
mysql_select_db("atm");
  $user = $_SESSION['$username'];
   if(isset($_POST['withdraw'])){
  
		$query1 = "select * from user where username = '$user'";
	$run=mysql_query($query1);
	while($row = mysql_fetch_array($run))
   { 

        $user = $_SESSION['$username']=$row['username'];
        //$user = $row['username'];
		$bal = $row['balance'];
		$locked=$row['lock'];
		$transaction = $row['trans'];
		
   }
      
     if($locked=='S_lock')
	   {
		   echo "<h3 align=center><FONT COLOR=AZURE>READ ONLY...BALANCE IS </h3>"."<h2 align=center>$bal<h2>";
		   exit();
	   }
	   
          

	   echo "<form align=center action = 'active.php' method = 'POST'><h2 align=center><FONT COLOR=AZURE>Enter amount:</FONT><input type='text' name='enamt'>
	   
	   
	   <br><br><input type ='submit' style='background-color:aquamarine; height:40px;width:80px; font-size:18' name = 'withamt'  value='submit'></h2></form>";
   
   
   }
   
 
   if(isset($_POST['withamt'])){
	    //$names = $_POST['name'];
		
		$amt = $_POST['enamt'];
		$query = "select * from user where username = '$user'";
	$run=mysql_query($query);
	while($row = mysql_fetch_array($run))
   { 

        $user = $_SESSION['$username']=$row['username'];
        //$user = $row['username'];
		$bal = $row['balance'];
		$locked=$row['lock'];
		$transaction = $row['trans'];
   }
       if($locked=='U_lock')
	   {
		   echo "<h3 align=center><FONT COLOR=AZURE>WRITE ONLY...YOU CANNOT UPDATE<BR>BALANCE IS </h3>"."<h2 align=center>$bal</FONT><h2>";
		   exit();
	   }
	   if($transaction=='read'){
		   date('h:i:s');
		   sleep(5);
	   }
	   
	   if($bal < $amt){
			   echo "not enough balance";
		   }
		   else{
		   $famt = $bal - $amt;
		   $nque = "update user set balance='$famt' where username='$user'";
		   if(mysql_query($nque)){
			   echo "<h3 align=center><FONT COLOR=AZURE> NEW BALANCE IS </h3>"."<h2 align=center>$bal</FONT><h2>";
   }
		   }
    
   
   }
   
   
   
   ?>
	   
   
	  
	  
	
	

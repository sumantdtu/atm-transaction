<?php
session_start();
if(!$_SESSION['$username']){
header('location:login.php?error=you are not a user');
}
?>
<?php
mysql_connect("localhost","root","");
mysql_select_db("atm");

   // $db_record = $_GET['db'];
   $query = "select * from user where username='verma'";
	$run=mysql_query($query);
	while($row = mysql_fetch_array($run))
   { 
        $db_name = $row['username'];
        //$user = $row['username'];
		$bal = $row['balance'];
		$locked=$row['lock'];
		
   }
   ?>
<html>
<head>
<title>php</title>
</head>
<b>WELCOME:<font size='5' color='red'><?php echo  $_SESSION['$username']?></font></b>
<form align=center method = 'post' action = 'db.php?db_form<?php echo $db_name;?>'> 
Enter Amount:<input type="text" name="enamt">
<input type ="submit" name = "submit" value = "submit">
</form>
</html>


   <?php
   mysql_connect("localhost","root","");
mysql_select_db("atm");
           
         if(isset($_POST['submit'])){
			// $db_record1 = $_GET['db_form'];
		   $amt = $_POST['enamt'];
		   
		   if($bal < $amt){
			   echo "not enough balance";
		   }
		   if($bal > $amt){
		   $famt = $bal - $amt;
		   $query1 = "update user set balance='$famt'where username='$_SESSION['username]'";
		   if(mysql_query($query1)){
			   echo $bal;		  
			   }
		   }
		   
		   
		 }
		 ?>
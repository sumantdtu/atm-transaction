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
		
   }
   

	   echo "<form align=center action = 'active.php' method = 'POST'><h2 align=center>Enter amount:<input type='text' name='enamt'>
	   
	   
	   <br><input type ='submit' name = 'withamt'  value='submit'></h2></form>";
   
   
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
   }
	   if($bal < $amt){
			   echo "not enough balance";
		   }
		   else{
		   $famt = $bal - $amt;
		   $nque = "update user set balance='$famt' where username='$user'";
		   if(mysql_query($nque)){
			   echo $famt;
   }
		   }
   
   
   }
   
   
   
   ?>
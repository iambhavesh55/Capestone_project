<?php
  $host='localhost';
  $user='root';
  $pass='';
  $dbname='commerce';

  if($connection=mysqli_connect($host, $user, $pass)){
  	if($database=mysqli_select_db($connection,$dbname)){
      

  } else{
  	echo 'Database not found.<br/>';
  }
}
else{
	echo 'Unable to connect Database Server';
}

  
?>
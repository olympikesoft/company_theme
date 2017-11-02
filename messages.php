<?php
    	$servername = 'localhost';
	$username = 'grannyho_startup';
	$password = 'antonio10';
	$db = 'grannyho_startup';	// Create linkection
	$link = mysqli_connect($servername, $username, $password,$db);
	mysqli_query($link,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_linkection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

	
	if (!mysqli_set_charset($link, "utf8")) {
    # TODO - Error: Unable to set the character set
    exit;
}

    if($link)
    {
        echo "Database connected";
    }else{
        echo "Error";
    }

?>

<?php

	 if(isset($_POST['email']) && isset($_POST['password'])){
	
		
		$query = "Select distinct content from message order by id DESC limit 1";
		
	
		
		mysql_query('SET CHARACTER SET utf8');
		
		
		$result = mysqli_query($link, $query);
		
		if(!$result)
		{
			die("Error in query #1" .  mysqli_error($link));
		}
		
		
		
		$numberof = mysqli_num_rows($result);
		
		if($numberof > 0)
		{
			// output data of each row
 while($row[] = $result->fetch_assoc()) {
 
 $tem = $row;
 
 $json = json_encode($tem);
 // echo json_last_error_msg();
		}
		}else{
			echo "Dont have messages.";
		}
		 echo $json;


	 
	 }
		
?>
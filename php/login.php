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
      //  echo "Database connected";
    }else{
      //  echo "Error";
    }
    
    
    session_start();
    ?>
    
   



<?php
$post_date = file_get_contents("php://input");
$data = json_decode($post_date);

//


//saving to database
//save query

//now i am just printing the values

	$password = $data->password;
	$email = $data->email;
		
		
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		
	//	$pass = md5($password);
		
		$query = "Select distinct id from user where email='$email' and password='$password'";
		

		
	
		
		$result = mysqli_query($link, $query);
		
		if(!$result)
		{
			die("Error in query #1" .  mysqli_error($link));
		}
		
		
		
		$numberof = mysqli_num_rows($result);
		
		if($numberof > 0)
		{
			// output data of each row
    $row = mysqli_fetch_assoc($result);
      $_SESSION['admin_id'] = $row['id'];
      $_SESSION['admin_code'] = $row['code'];
      
      echo $row['code'];
      
      $updateSql = "Update user set last_login=now() where id ='{$_SESSION['admin_id']}'";
      $result_update = mysqli_query($link, $updateSql);
      
      if($result_update)
      {
			
			Header("Location: /admin/clients.php");
			
      }
      
      if(!$result_update)
      {
          die(mysqli_error($link));
      }

            
		
		

	 }
		else{
			echo "Dont have users";
		}
	
$link->close();

	 

		
		
?>
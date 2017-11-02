<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
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
        //echo "Database connected";
    }else{
       // echo "Error";
    }
 session_start();
    ?>
<?php

$result = $link->query("SELECT name, date_initial, price FROM Projects where User_id='{$_SESSION['admin_id']}' and state = '2'");

if(!$result)
{
    die(mysqli_error($link));
}

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"name":"'  . $rs["name"] . '",';
    $outp .= '"date_initial":"'   . $rs["date_initial"]        . '",';
    $outp .= '"price":"'. $rs["price"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$link->close();

echo($outp);
?>

<?php
  
include 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	$json=file_get_contents('php://input');

	$data = json_decode($json, true);

	if (isset($data['client_id']) && isset($data['phone']) && isset($data['n_persons']) && isset($data['date']) && isset($data['time'])) {
		

		$client_id = $data['client_id'];
		$phone = $data['phone'];
		$n_persons = $data['n_persons'];
		$date = $data['date'];
		$time = $data['time'];

		// ligação à base de dados
		$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);

		// criar query numa string
		$query  = "INSERT INTO bookings (client_id, phone, n_persons, date, time, created_at) VALUES ('$client_id', '$phone', '$n_persons', '$date', '$time', NOW())";

		// executar a query
		if(!($result = @ mysqli_query($db, $query)))
			showerror($db);
			

		// get last booking
			$query = "select * from bookings where client_id='$client_id' order by id desc limit 1";
			if(!($result = @ mysqli_query($db, $query)))
				showerror($db);
			   
			$last_booking = mysqli_fetch_assoc($result);

		// fechar a ligação à base de dados
		mysqli_close($db);


		
		// allow cross-origin requests (CORS)
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");
		// convert to JSON
		$json=json_encode($last_booking);
		echo $json;
		
	}
	else {
    	header($_SERVER["SERVER_PROTOCOL"] . " 400 Bad Request");    
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");
        die('{"Error":"missing one or more properties in data object"}');         
    }

}
	
if($_SERVER['REQUEST_METHOD'] == 'GET') {
	
	// ligação à base de dados
	$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);

		$client_id = $_GET['client_id'];
	
		$query = "select * from bookings where client_id='$client_id' order by id desc";
		
		if(!($result = @ mysqli_query($db, $query)))
			showerror($db);
		// vai buscar o resultado da query

		$nrows  = mysqli_num_rows($result);
		$orders = [];
		for($i=0; $i<$nrows; $i++)
			$bookings[$i] = mysqli_fetch_assoc($result);

		// fechar a ligaçãbase de dados
		mysqli_close($db);


	
	// allow cross-origin requests (CORS)
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");
	// convert to JSON
	$json = json_encode($bookings);
	echo $json;
	
}

// allow cross-origin requests (CORS)
if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");	
}	    



?>



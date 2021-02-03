<?php

function genResponse($txt)
{
	$txt1['text'] = $txt;

	$msg['messages'] = array($txt1);
	
	return json_encode($msg);
	
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketbot";



$Email = $_GET['Email'];
$source_st=$_GET['source_st'];
$destination=$_GET['destination'];

$Date=$_GET['time'];

$Seats=$_GET['Seats'];
$fb_id = $_GET['fb_id'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql= "SELECT * FROM `buytbl` WHERE `From_st`='$source_st' AND `To_st`='$destination' AND `Date`='$Date'";

$query = $conn->query($sql);
echo $conn->error;
$reply = "Here are the available tickets:\n\n";
if(mysqli_num_rows($query) > 0)
{
	$i = 1;
	while($row = mysqli_fetch_array($query))
	{
		$reply .= "Ticket No: ". $i . "\n";
		$reply .= "Seller's Email: " . $row[1] . "\n";
		$reply .= "Phone no: " . $row[2] . "\n";
		$reply .= "Time: " . $row[5] . "\n";
		$reply .= "No of Seats available: " . $row[7] . "\n";
		$i++;
	}
	
	
	echo genResponse($reply);
	
	
}

else
{
	echo genResponse("No ticket available\n We will notify you in your email when any ticket is available.");
	 $sql = "INSERT INTO `purchasetbl` (`Email`, `Start`, `End`, `Date`,`Seats`, `fb_id`) VALUES ('$Email', '$source_st', '$destination','$Date','$Seats', '$fb_id')";
	 $query = $conn->query($sql);
	 echo $conn->error;
	
}
?>




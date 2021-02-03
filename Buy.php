<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketbot";

$Email = $_GET['Email'];
$Phone_no=$_GET['Phone_no'];
$From_st=$_GET['From_st'];
$To_st=$_GET['To_st'];
$Date=$_GET['Date'];
$Time=$_GET['Time'];
$no_of_seats=$_GET['no_of_seats'];


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $sql = "INSERT INTO `buytbl` (`Email`, `Phone_no`, `From_st`, `To_st`, `Date`, `Time`,`no_of_seats`) VALUES ('$Email', '$Phone_no', '$From_st', '$To_st', '$Date', '$Time','$no_of_seats')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//Send notification if ticket availabe
function sendmsg($user, $train_name, $userEmail, $phone, $time)
{
	$link = "https://api.chatfuel.com/bots/5c5f070076ccbc2745663fd8/users/". $user  ."/send?chatfuel_token=mELtlMAHYqR0BvgEiMq8zVek3uYUK3OJMbtyrdNPTrQB9ndV0fM7lWTFZbM4MZvD&chatfuel_message_tag=RESERVATION_UPDATE&chatfuel_block_id=5c5f15e20ecd9f2d174241f9&train_name=" . $train_name . "&email=" . $userEmail . "&phone=" . $phone . "&time=" . $time;
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,$link);
	curl_setopt($ch, CURLOPT_POST, 1);
	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));

	$server_output = curl_exec($ch);
	

	curl_close ($ch);
	
	return $server_output;
	
}

$sql= "SELECT * FROM `purchasetbl` WHERE `Start`='$From_st' AND `End`='$To_st' AND `Date`='$Date'";

$query = $conn->query($sql);
echo $conn->error;

if(mysqli_num_rows($query) > 0)
{
	echo "Found";
	while($row = mysqli_fetch_array($query))
	{
		//echo sendmsg($row[6], "ABC Train", $Email, $Phone_no, $Time);
		echo sendmsg($row[6], "notrain", $Email, $Phone_no, $Time);
		
	}
}


$conn->close();
?>



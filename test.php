<?php
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


echo sendmsg("2827063670644883", "bonolota", "abc@abc.co", "123456", "12:30");

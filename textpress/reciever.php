<?php
		require('vendor/twilio/sdk/Services/Twilio.php'); 
    header("content-type: text/xml");
		echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

		$account_sid = 'AC5ddfda7909b9b25c06d3dbdc2dbe5a75'; 
		$auth_token = 'b0d3d3844073b78843bad5647831cdb7'; 
		$client = new Services_Twilio($account_sid, $auth_token); 
		
		echo "TESTING!!!"
		echo $client->account->messages;
		$client->account->messages->create(array( 
			'To' => "+16465042544", 
			'From' => "+16463744020", 
			'Body' => "Hey Jenny! Good luck on the bar exam!", 
			));
?>

<!--<Response>

	<Redirect>https://textpress.herokuapp.com/index.php</Redirect>
</Response>-->

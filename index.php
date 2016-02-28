<?php
	//for number +16463744020 the URL is http://localhost:8080/receiver.php
	header("content-type: text/xml");
		echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	error_log("hello, this is a test!");		
?>
<Response>
	<Message>Hello, Mobile Monkey</Message>
</Response>


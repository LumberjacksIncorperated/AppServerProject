<?php

//----------------------------------------
// AUTHOR: Lumberjacks Incorperated (2018)
//---------------------------------------- 

//---------------------------------------- 
// INCLUDES
//---------------------------------------- 
include dirname(__FILE__).'/Modules/recieved_message_storage_php_api.php';
include dirname(__FILE__).'/Modules/php_environment_php_api.php';

//---------------------------------------- 
// SCRIPT
//---------------------------------------- 
	$messageText = $_REQUEST['message'];
	$ipAddressOriginOfMessage = getConnectedClientIPAddress();
	addMessageToMessagesStorageWithMessageTextAndIPAddressOrigin($messageText, $ipAddressOriginOfMessage);

?>


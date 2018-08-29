<?php
//--------------------------------------------------------------------------------------------------------------
//
// PURPOSE
// -------
// Take a client request containing a message, and add that message to a local message storage 
//
// AUTHOR
// -------
// Lumberjacks Incorperated (2018)
//--------------------------------------------------------------------------------------------------------------

//---------------------------------------- 
// INCLUDES
//---------------------------------------- 
include_once dirname(__FILE__).'/Modules/recieved_message_storage_php_api.php';
include_once dirname(__FILE__).'/Modules/php_environment_php_api.php';
include_once dirname(__FILE__).'/Modules/secured_session_php_api.php';

//---------------------------------------- 
// SCRIPT
//---------------------------------------- 
	if (!ensureThisIsASecuredSession()) {
		die();
	}

	echo 'This is private'; // DEBUG MESSAGE

	$messageText = getMessageFieldContentsFromCurrentClientRequest();
	$ipAddressOriginOfMessage = getConnectedClientIPAddress();
	addMessageToMessagesStorageWithMessageTextAndIPAddressOrigin($messageText, $ipAddressOriginOfMessage);

?>


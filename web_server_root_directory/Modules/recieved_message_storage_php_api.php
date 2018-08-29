<?php
//--------------------------------------------------------------------------------------------------------------
// AUTHOR
// -------
// Lumberjacks Incorperated (2018)
//--------------------------------------------------------------------------------------------------------------

//---------------------------------------- 
// INCLUDES
//---------------------------------------- 
include_once 'my_application_database_php_api.php';

//---------------------------------------- 
// EXPOSED FUNCTTIONS
//---------------------------------------- 
	function addMessageToMessagesStorageWithMessageTextAndIPAddressOrigin($messageText, $ipAddressOriginOfMessage) {
		if ($messageText && $ipAddressOriginOfMessage) {
			$sanitisedMessageText = sanitiseStringForSQLQuery($messageText);
			$sanitisedIpAddressOriginOfMessage = sanitiseStringForSQLQuery($ipAddressOriginOfMessage);
			modifyDataByMakingSQLQuery("INSERT INTO messages (message_text, ip_address_origin_of_message) VALUES ('".$sanitisedMessageText."', '".$sanitisedIpAddressOriginOfMessage."')");
		}
	}

?>
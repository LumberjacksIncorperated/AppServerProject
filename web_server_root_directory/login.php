<?php
//--------------------------------------------------------------------------------------------------------------
//
// PURPOSE
// -------
// To login
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
	$username = getUsernameFieldContentsFromCurrentClientRequest();
	$password = getPasswordFieldContentsFromCurrentClientRequest();
	$loginSessionKey = getSessionKeyForNewSessionWithUsernameAndPassword($username, $password);
	if ($loginSessionKey) {
		echo $loginSessionKey;
	} else {
		echo 'Failed to login, incorrect username and password';
	}

?>
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
// INTERNAL FUNCTIONS
//---------------------------------------- 
    function _makeSanitizedSQLQueryToGetUnexpiredSessionRecordsForSessionKey($sessionKeyFromUser){
    	$secondsUntilASessionExpires = 200;
    	$sanitisedSessionKeyFromUser = sanitiseStringForSQLQuery($sessionKeyFromUser);
		$currentSessionRecord = fetchDataByMakingSQLQuery("SELECT * FROM sessions WHERE TIMESTAMPDIFF(second, sessions.last_session_renewal, CURRENT_TIMESTAMP) < ".$secondsUntilASessionExpires." AND session_key_sha1 = '".strval($sanitisedSessionKeyFromUser)."' LIMIT 1");
		return $currentSessionRecord;
    }

	function _retriveCurrentSessionRecord() {
		$currentSessionRecord = NULL;
		$sessionKeyFromUser = $_REQUEST['session_key'];
		if ($sessionKeyFromUser) {
			$currentSessionRecord = _makeSanitizedSQLQueryToGetUnexpiredSessionRecordsForSessionKey($sessionKeyFromUser);
		}
		return $currentSessionRecord;
	}

	function _renewCurrentSession() {
		$currentSessionRecord = _retriveCurrentSessionRecord();
		if ($currentSessionRecord) {
			$sessionKey = $currentSessionRecord['session_key_sha1'];
			modifyDataByMakingSQLQuery("UPDATE sessions SET last_session_renewal = CURRENT_TIMESTAMP WHERE session_key_sha1 = '".strval($sessionKey)."'");
		}
	}

//---------------------------------------- 
// EXPOSED FUNCTTIONS
//---------------------------------------- 
	function ensureThisIsASecuredSession() {
		$currentSessionRecord = _retriveCurrentSessionRecord();
		if ($currentSessionRecord) {
			_renewCurrentSession();
			return true;
		} else {
			return false;
		}
	}

?>
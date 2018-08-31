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
// CONSTANT DEFINITION
//----------------------------------------
define("SESSIONS_UNTIL_A_SESSION_EXPIRES", 200);

//---------------------------------------- 
// INTERNAL FUNCTIONS
//---------------------------------------- 
    function _makeSanitizedSQLQueryToGetUnexpiredSessionRecordsForSessionKey($sessionKeyFromUser){
    	$sanitisedSessionKeyFromUser = sanitiseStringForSQLQuery($sessionKeyFromUser);
		$currentSessionRecord = fetchDataByMakingSQLQuery("SELECT * FROM sessions WHERE TIMESTAMPDIFF(second, sessions.last_session_renewal, CURRENT_TIMESTAMP) < ".SESSIONS_UNTIL_A_SESSION_EXPIRES." AND session_key_sha1 = '".strval($sanitisedSessionKeyFromUser)."' LIMIT 1");
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

	function getSessionKeyForNewSessionWithUsernameAndPassword($username, $password) {
		$sessionKeyForNewSession = null;
		if ($username && $password) {
			$sanitisedUsername = sanitiseStringForSQLQuery($username);
			$passwordSha1 = sha1($password);
			$userAccountOnRecord = fetchDataByMakingSQLQuery("SELECT * FROM accounts WHERE password_sha1 = '".$passwordSha1."' AND username = '".$sanitisedUsername."' LIMIT 1");
			$sessionKeyForNewSession = $userAccountOnRecord["password_sha1"];
			modifyDataByMakingSQLQuery("UPDATE sessions SET last_session_renewal = CURRENT_TIMESTAMP WHERE session_key_sha1 = '".strval($sessionKey)."'");
		}

		return $sessionKeyForNewSession;
	}

?>














<?php

//----------------------------------------
// AUTHOR: Lumberjacks Incorperated (2018)
//----------------------------------------

//---------------------------------------- 
// FUNCTTIONS
//---------------------------------------- 
	function _makeConnectionToMyApplicationDatabase() {
		$connectionToMyApplicationDatabase = new mysqli("127.0.0.1", "root", "password", "my_application_database");
		if ($connectionToMyApplicationDatabase->connect_errno) {
			$connectionToMyApplicationDatabase = NULL;
		}
		return $connectionToMyApplicationDatabase;
	}

	function _closeConnectionToMyApplicationDatabase($myApplicationDatabase) {
		if ($myApplicationDatabase) {
			$myApplicationDatabase->close();
		}
	}

	function _fetchDataFromQueryResult($queryResult) {
		$fetchedData = NULL;
		if ($queryResult) {
			$fetchedData = $queryResult->fetch_all();
			$queryResult->close();
		}	
		return $fetchedData;
	}

	function fetchDataByMakingSQLQuery($queryToFetchData) {
		$connectionToMyApplicationDatabase = _makeConnectionToMyApplicationDatabase();
		$resultOfQuery = $connectionToMyApplicationDatabase->query($queryToFetchData);
		$fetchedData = _fetchDataFromQueryResult($resultOfQuery);
		_closeConnectionToMyApplicationDatabase($connectionToMyApplicationDatabase);
		return $fetchedData;
	}

	function modifyDataByMakingSQLQuery($queryToModifyData) {
		//echo $queryToModifyData;
		$connectionToMyApplicationDatabase = _makeConnectionToMyApplicationDatabase();
		$resultOfQuery = $connectionToMyApplicationDatabase->query($queryToModifyData);
		_closeConnectionToMyApplicationDatabase($connectionToMyApplicationDatabase);
	}

	function sanitiseStringForSQLQuery($unsanitisedInput) {
		$connectionToMyApplicationDatabase = _makeConnectionToMyApplicationDatabase();
		$sanitisedInput = $connectionToMyApplicationDatabase->real_escape_string($unsanitisedInput);
		_closeConnectionToMyApplicationDatabase($connectionToMyApplicationDatabase);
		return $sanitisedInput;
	}

?>

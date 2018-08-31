<?php
//--------------------------------------------------------------------------------------------------------------
// AUTHOR
// -------
// Lumberjacks Incorperated (2018)
//--------------------------------------------------------------------------------------------------------------

//---------------------------------------- 
// EXPOSED FUNCTTIONS
//---------------------------------------- 
    function getConnectedClientIPAddress() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    function getMessageFieldContentsFromCurrentClientRequest() {
        $messageFieldContentsOfCurrentHTTPRequest = '';
        if (isset($_REQUEST['message']))
            $messageFieldContentsOfCurrentHTTPRequest = $_REQUEST['message'];
        return $messageFieldContentsOfCurrentHTTPRequest;
    }

    function getPasswordFieldContentsFromCurrentClientRequest() {
        $passwordFieldContentsOfCurrentHTTPRequest = '';
        if (isset($_REQUEST['password']))
            $passwordFieldContentsOfCurrentHTTPRequest = $_REQUEST['password'];
        return $passwordFieldContentsOfCurrentHTTPRequest;
    }

    function getUsernameFieldContentsFromCurrentClientRequest() {
        $usernameFieldContentsOfCurrentHTTPRequest = '';
        if (isset($_REQUEST['username']))
            $usernameFieldContentsOfCurrentHTTPRequest = $_REQUEST['username'];
        return $usernameFieldContentsOfCurrentHTTPRequest;
    }
?>
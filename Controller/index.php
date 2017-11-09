<?php
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL)
        $action = 'showRequestToken';
}

if(isset($_SESSION['api_key'])) {
    $api_key = $_SESSION['api_key'];
} else {
    $api_key = Null;
}

$basicurl = "http://localhost/JWTServerGit/index.php";

switch($action) :
    case 'requestToken' :
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $memType = filter_input(INPUT_POST, 'memType');
        $keyReq = "?username=" . $username
                . "&password=" . $password
                . "&memType="  . $memType
                . "&Service=Requesr_Key";
        
        // Initialise Curl
        $ch = Curl_init();
        curl_setopt($ch, CURLOPT_URL, $basicUrl . $keyReq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("Accept: applicaiton/json"));   
        $api_key = curl_exec($ch);
        curl_close($ch);
        
        $_SESSION['api_key'] = $api_key;
        include '../View/ShowToken.php';
        break;
    
    case 'showRequestToken' :
        include '../View/RequestToken.php';  
        break;
    
    case 'showToken' :
        
        break;
    
    case 'requestService1' :
        $keyReq = "?api_key=" . $api_key . "&Service=Service1";
        
        // Initialise Curl
        $ch = Curl_init();
        curl_setopt($ch, CURLOPT_URL, $basicUrl . $keyReq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("Accept: applicaiton/json"));   
        $response = curl_exec($ch);
        curl_close($ch);
        
        include '../View/ShowResponse.php';
        break;
    
    case 'requestService2' :
        $keyReq = "?api_key=" . $api_key . "&Service=Service2";
        
        // Initialise Curl
        $ch = Curl_init();
        curl_setopt($ch, CURLOPT_URL, $basicUrl . $keyReq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("Accept: applicaiton/json"));   
        $response = curl_exec($ch);
        curl_close($ch);
        
        include '../View/ShowResponse.php';
        break;
endswitch;


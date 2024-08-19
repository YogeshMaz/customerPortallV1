<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
include 'logfunction.php'; // Include the log function

if (isset($_SESSION['email']) && isset($_POST['action'])) {
    $user = $_SESSION['email'];
    $action = $_POST['action'];
    log_user_activity("Customer Email : {$user} \n triggered Page action : {$action}");
    $reportName = "machinemaze-project-management";
    $formName = "Customer_Portal_Logs";
    $current_time = date('d-M-Y H:i:s');
    $getUserLogs = fetchDataFromZohoCreator("All_Customer_Portal_Logs", "machinemaze-project-management", $_SESSION['email'], "Customer_Email", 200);
    $getDecoded = json_decode($getUserLogs, true);
    $sessionLogout = $getDecoded['data'][0]['Session_Logout'];
    $constHr = "1:0:0";
    $triggerLogOut = false;
    if((int)$constHr > (int)$sessionLogout){
        $triggerLogOut = false;
        echo " * Stay Logged In ";
    } else{
         $triggerLogOut = true;
         echo " * Log Out ";
         header('Location : https://customerportal.machinemaze.com/');
    }
    print_r("get log data : " . json_encode($sessionLogout));
    $addData = array(
        "data" => array(
            "Page" => $action,
            "Customer_Email" => $user,
            "Date_Time" => $current_time
        )
    );
    $json_data = json_encode($addData);
    // $fetchUserLog = fetchDataOfUsersLogs("All_Customer_Portal_Logs", "machinemaze-project-management");
    $addedLog = updateLogRecord($reportName, $formName, $json_data);
    echo json_encode(['status' => 'success']);
    return $addedLog;
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}

?>
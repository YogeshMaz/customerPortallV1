<?php
function log_user_activity($message) {
    $log_file = 'user_activity.log';
    $current_time = date('Y-m-d H:i:s');
    $dashes = "-----------------------------------------------------------------------";
    $log_message = "Log Time :: [{$current_time}] \n {$message}\n {$dashes} \n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
}

function updateLogRecord($reportName, $formName, $json_data)
{
    $access_token = getAccessToken();
        if (!$access_token) {
            echo "Failed to get access token.";
            exit;
        }

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://creator.zoho.in/api/v2.1/arun.ramu_machinemaze/'. $reportName .'/form/'. $formName,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $json_data,
      CURLOPT_HTTPHEADER => array(
        "Authorization: Zoho-oauthtoken $access_token",
        'Content-Type: application/x-www-form-urlencoded',
        'Cookie: ZCNEWLIVEUI=true; _zcsr_tmp=b451eca6-6321-4a12-b81e-b9d87897881f; f8176abf63=ac0bf5971029d5628fd013d3a9099af0; zccpn=b451eca6-6321-4a12-b81e-b9d87897881f'
    ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    echo $response;
    return $response;
}

function fetchDataOfUsersLogs($reportname, $appname)
{
    $access_token = getAccessToken();
    if (!$access_token) {
        echo "Failed to get access token.";
        exit;
    }

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://creator.zoho.in/api/v2.1/arun.ramu_machinemaze/" . urlencode($appname) . "/report/" . $reportname,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            "Authorization: Zoho-oauthtoken $access_token",
            'Content-Type: application/x-www-form-urlencoded',
            'Cookie: ZCNEWLIVEUI=true; _zcsr_tmp=b451eca6-6321-4a12-b81e-b9d87897881f; f8176abf63=ac0bf5971029d5628fd013d3a9099af0; zccpn=b451eca6-6321-4a12-b81e-b9d87897881f'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    // echo json_encode($response);
    return $response;
}

function fetchDataOfUsers($reportname, $appname)
{
    $access_token = getAccessToken();
    if (!$access_token) {
        echo "Failed to get access token.";
        exit;
    }

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://creator.zoho.in/api/v2.1/arun.ramu_machinemaze/" . urlencode($appname) . "/report/" . $reportname,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            "Authorization: Zoho-oauthtoken $access_token",
            'Content-Type: application/x-www-form-urlencoded',
            'Cookie: ZCNEWLIVEUI=true; _zcsr_tmp=b451eca6-6321-4a12-b81e-b9d87897881f; f8176abf63=ac0bf5971029d5628fd013d3a9099af0; zccpn=b451eca6-6321-4a12-b81e-b9d87897881f'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    // echo json_encode($response);
    return $response;
}


function uploadFiles($reportName, $formName, $json_data)
{
    $access_token = getAccessToken();
    if (!$access_token) {
        echo "Failed to get access token.";
        exit;
    }
    $curl = curl_init();

    // $reportName = 'machinemaze-project-management';
    // $formName = 'create_rfq_test_form';

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://creator.zoho.in/api/v2.1/arun.ramu_machinemaze/" . $reportName . "/form/" .$formName,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $json_data,
    CURLOPT_HTTPHEADER => array(
        "Authorization: Zoho-oauthtoken $access_token",
        'Content-Type: application/json',
        'Cookie: ZCNEWLIVEUI=true; _zcsr_tmp=89c5fd60-6a3f-49a7-90fb-4691878af05c; zalb_f8176abf63=1920247976c316b14a7c52e70618ba1f; zccpn=89c5fd60-6a3f-49a7-90fb-4691878af05c'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
    return $response;
}

function addCustomerRecords($appName, $formName, $json_data){
    $access_token = getAccessToken();
    if (!$access_token) {
        echo "Failed to get access token.";
        exit;
    }
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://creator.zoho.in/api/v2.1/arun.ramu_machinemaze/" . $appName . "/form/" .$formName,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $json_data,
    CURLOPT_HTTPHEADER => array(
        "Authorization: Zoho-oauthtoken $access_token",
        'Content-Type: application/json',
        'Cookie: ZCNEWLIVEUI=true; _zcsr_tmp=89c5fd60-6a3f-49a7-90fb-4691878af05c; zalb_f8176abf63=1920247976c316b14a7c52e70618ba1f; zccpn=89c5fd60-6a3f-49a7-90fb-4691878af05c'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
    return $response;
}

function fetchDataFromZohoCreator($reportname, $appname, $email, $emailfield, $maxLimit)
{
    $access_token = getAccessToken();
    if (!$access_token) {
        echo "Failed to get access token.";
        exit;
    }

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://creator.zoho.in/api/v2.1/arun.ramu_machinemaze/" . urlencode($appname) . "/report/" . $reportname . "?" . $emailfield . "=" . urlencode($email) . "&max_records=" . $maxLimit,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS => '%40newrecords.json=',
        CURLOPT_HTTPHEADER => array(
            "Authorization: Zoho-oauthtoken $access_token",
            'Content-Type: application/x-www-form-urlencoded',
            'Cookie: ZCNEWLIVEUI=true; _zcsr_tmp=b451eca6-6321-4a12-b81e-b9d87897881f; f8176abf63=ac0bf5971029d5628fd013d3a9099af0; zccpn=b451eca6-6321-4a12-b81e-b9d87897881f'
        ),
    ));

    $response = curl_exec($curl);
    //echo $response;
    curl_close($curl);
    return $response;
}


function getAccessToken()
{
    $tokenData = json_decode(@file_get_contents('token.json'), true);

    // Check if the token is expired or doesn't exist
    if (!$tokenData || time() >= $tokenData['expires_at']) {
        // Token is expired or doesn't exist, refresh it
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://accounts.zoho.in/oauth/v2/token?refresh_token=1000.1c35e22b3710eb57496e09c7baa45652.dd641bf13e715993132e6c5be95e5b1f&client_id=1000.YKAA6FNUQJ6NL13TSM6JZ6MFNZ821U&client_secret=04c2314557bdd48ad3f394815a624680c3b890c93b&grant_type=refresh_token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Cookie: 6e73717622=94da0c17b67b4320ada519c299270f95; _zcsr_tmp=a6db683c-10b5-405f-8ba1-174c33dbc4e2; iamcsr=a6db683c-10b5-405f-8ba1-174c33dbc4e2'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, true);
        if (isset($data['access_token'])) {
            // Save the new token and its expiration time (1 hour from now)
            $tokenData = [
                'access_token' => $data['access_token'],
                'expires_at' => time() + 3600 // Tokens are valid for 1 hour
            ];
            file_put_contents('token.json', json_encode($tokenData));
        } else {
            // Handle error
            error_log('Failed to refresh access token: ' . $response);
            return null;
        }
    }

    return $tokenData['access_token'];
}
?>
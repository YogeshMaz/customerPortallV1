<html lang="en">

<head>
    <title>Customer DASHBOARD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Karla:ital,wght@0,200..800;1,200..800&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div id="wrapper">

        <div id="navbar-wrapper">
            <nav class="navbar navbar-inverse p-0">
                <div class="w-100">
                    <div class="navbar-header w-100 row" style="align-items: center;">
                        <div class="row">
                            <div class="col-2 col-md-2">
                                <div class="sidebar-brand d-flex">
                                    <img src="images/logomm.jpg" class="h-auto" style="width:35px;"> <strong class="d-none d-sm-block p-2">Machine Maze</strong>
                                    <div class="text-end px-4 fw-bold position-relative d-lg-none d-md-block"> <span class="position-absolute fs-6" style="top:-50px;right: -10px">X</span> </div>
                                </div>
                            </div>
                            <div class="text-center col-10 col-md-10 d-flex">
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="col-md-8 mx-auto mt-5">

            <div class="loginSec">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img src="images/fp2.jpg" width="100%" style="height: 260px; object-fit: cover;">
                    </div>
                    <div class="col-md-6">
                        <h4>Forgot Password</h4>
                        <p class="fs13">Enter your email and we will send you a link to reset your password.</p>
                        <!-- Display alert if URL parameter "error" is set to "invalid" -->
                        <form id="loginFormLoader" action="forgot_pwd.php" method="POST">
                            <div class="mb-3 mt-3 inputbox">
                                <label for="email" class="form-label">Email:</label>
                                <input required="" type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>

                            <input type="submit" class="btn btn-primary mt-3 mb-0 w-100" value="Submit">
                            <div class="text-center mt-3">
                                <a href="index.php"><i class="fa fa-chevron-left"></i> Back to login</a>
                            </div>
                        </form>
                        <!-- Loader element -->
                        <div class="loader_box d-none" id="loader">
                            <div class="loader"></div>
                        </div>
                    </div>

                </div>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $email = $_POST['email'];
                        $resUser = fetchDataOfUsers('Customer_Portal_Database_Report', 'machinemaze-project-management');
                        $resUserData = json_decode($resUser, true);
                        $validDBEmail = false;
                        if($resUserData['code'] == 3000){
                            foreach($resUserData['data'] as $eachUser){
                                if($eachUser['Email'] == $email){
                                    $validDBEmail = true;
                                }
                            }
                        }
                        if($validDBEmail == true) 
                        {
                            $resetReponse = resetPassword($email);
                            $resetReponse_decoded = json_decode($resetReponse);
                            if ($resetReponse_decoded->code == 3000) {
                    ?> <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                                    <strong>Successs</strong> <?php echo "Reset password email sent to '" . $email . "'" ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php
                                $_POST['email'] = "";
                                exit();
                            } else {
                            ?> <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                                    <strong>Error</strong> <?php echo "Something went wrong! Contact your administrator." ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php
                            }
                        } else {
                            ?> <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                <strong>Error</strong> <?php echo "Please enter a valid email address. Entered email does not match any in our database." ?> <br>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> <?php
                                }
                            }
                                ?>

            </div>

        </div>

    </div>

    <?php

    function resetPassword($email)
    {

            $access_token = getAccessToken();
            if (!$access_token) {
                echo "Failed to get access token.";
                exit;
            }

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://creator.zoho.in/api/v2.1/arun.ramu_machinemaze/machinemaze-project-management/form/Reset_Password',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
            "data": {
                "Reset_Password": "true",
                "Email" : ' . $email . '
            }
        }',
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Zoho-oauthtoken $access_token",
                    'Content-Type: application/x-www-form-urlencoded',
                    'Cookie: ZCNEWLIVEUI=true; _zcsr_tmp=b451eca6-6321-4a12-b81e-b9d87897881f; f8176abf63=ac0bf5971029d5628fd013d3a9099af0; zccpn=b451eca6-6321-4a12-b81e-b9d87897881f'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // echo $response;
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

        return $response;
    }

    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

</body>
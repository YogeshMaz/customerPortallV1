<?php
include '../logfunction.php';

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Collect form data
        $formData = [
            'RFQ Reference Number' => $_POST['rfqno'] ?? '',
            'RFQ Start Date' => $_POST['rfqsdate'] ?? '',
            'RFQ End Date' => $_POST['rfqedate'] ?? '',
            'Type of Project' => $_POST['protype'] ?? '',
            'Target Price/ Unit Quantity' => $_POST['targetp'] ?? '',
            'Total Order Value' => $_POST['tov'] ?? '',
            'Preferred Quotation Currency' => $_POST['currency'] ?? '',
            'Mandatory Compliance & Certification' => $_POST['mcc'] ?? '',
            'Describe- Any Other Compliance' => $_POST['daoc'] ?? '',
            'Upload Itemwise Quantity List' => $_FILES['uploadql']['name'] ?? '',
            'Raw Material Detail' => $_POST['rawmd'] ?? '',
            'Part Number : Description' => $_POST['pnd'] ?? '',
            'Brief Description of the Project' => $_POST['bdotp'] ?? '',
            'Mandatory Inspection required' => $_POST['mir'] ?? '',
            'Job Type' => $_POST['jobtype'] ?? '',
            'UOM' => $_POST['uom'] ?? '',
            'Quantity / Year' => $_POST['qyear'] ?? '',
            'Quantity/ Batch' => $_POST['qbatch'] ?? '',
            'Type of Frequency' => $_POST['typefreq'] ?? '',
            'Batch Frequency' => $_POST['bfreq'] ?? '',
            'Ship To Address' => [
                'Address Line1' => $_POST['ship_add_line1'] ?? '',
                'Address Line2' => $_POST['ship_add_line2'] ?? '',
                'City / District' => $_POST['ship_city'] ?? '',
                'State' => $_POST['ship_state'] ?? '',
                'Postal Code' => $_POST['ship_postal_code'] ?? '',
                'Country' => $_POST['ship_country'] ?? '',
            ],
            'Ship to country' => $_POST['ship_to_county'] ?? '',
            'Customer Email' => $_POST['cemail'] ?? '',
            'User Email' => $_POST['user_email'] ?? '',
        ];

        // Print the collected form data
        printFormData($formData);

        function formattedDateForCreator($date){
            $dateTime = new DateTime($date);
            // Format the DateTime object to the desired format
            $formattedDate = $dateTime->format('d-M-Y H:i:s');
            return $formattedDate;
        }   
        $startDateF = formattedDateForCreator($_POST['rfqsdate']);
        $endDateF = formattedDateForCreator($_POST['rfqedate']);
    
        $SignFileName = createSignatureFilepathAndFiles();
        $signUrl = 'https://customerportal.machinemaze.com/media/auth_signature/'. $SignFileName;
        
        $EnggFileName = createEnggDrawingFilepathAndFiles();
        $EnggFile = 'https://customerportal.machinemaze.com/media/engg_drawings/'. $EnggFileName;
        
        $creatorData = [
            'RFQ_Reference_Number' => $_POST['rfqno'] ?? '',
            'RFQ_Start_Date' => $startDateF ?? '',
            'RFQ_End_Date' => $endDateF ?? '',
            'Type_of_Project' => [$_POST['protype']] ?? '',
            'Target_Price_Unit_Quantity' => $_POST['targetp'] ?? '',
            'Total_Order_Value' => $_POST['tov'] ?? '',
            'Preferred_Quotation_Currency' => $_POST['currency'] ?? '',
            'Mandatory_Compliance_Certification' => [$_POST['mcc']] ?? '',
            'Describe_Any_Other_Compliance' => $_POST['daoc'] ?? '',
            // 'Upload_File_Of_Drawings_Pictures_Engineering_Document' => [
            //     'filename' => $_FILES['uploadql']['name'] ?? '',
            //     'tmp_name' => $_FILES['uploadql']['tmp_name'] ?? '',
            //     'size' => $_FILES['uploadql']['size'] ?? '',
            //     'type' => $_FILES['uploadql']['type'] ?? '',
            //     'error' => $_FILES['uploadql']['error'] ?? ''
            // ],
            'Raw_Material_Detail' => $_POST['rawmd'] ?? '',
            'Part_Number_Description' => $_POST['pnd'] ?? '',
            'Brief_Description_of_the_Project' => $_POST['bdotp'] ?? '',
            'Mandatory_Inspection_Required' => $_POST['mir'] ?? '',
            'Job_Type' => [$_POST['jobtype']] ?? '',
            'UOM' => $_POST['uom'] ?? '',
            'Quantity_Year' => $_POST['qyear'] ?? '',
            'Quantity_Batch' => $_POST['qbatch'] ?? '',
            'Batch_Frequency1' => $_POST['typefreq'] ?? '',
            'Batch_Frequency2' => $_POST['bfreq'] ?? '',
            'Ship_To_Address' => [
                'address_line_1' => $_POST['ship_add_line1'] ?? '',
                'address_line_2' => $_POST['ship_add_line2'] ?? '',
                'district_city' => $_POST['ship_city'] ?? '',
                'state_province' => $_POST['ship_state'] ?? '',
                'postal_code' => $_POST['ship_postal_code'] ?? '',
                'country' => $_POST['ship_country'] ?? ''
            ],
            'Ship_To_Country' => $_POST['ship_to_county'] ?? '',
            'Customer_Email' => $_POST['cemail'] ?? '',
            'sign_url' => $signUrl ?? '',
            'Mail_Send_To' => $_POST['mailsend'] ?? '',
            'User_Email' => $_POST['user_email'],
            'engg_drawing' => $EnggFile ?? ''
        ]; 
        
        // Create an array with a "data" key containing the form data
        $responseCreator = [
            'data' => $creatorData
        ];
        
        // Encode the array to JSON
        $jsonResponse = json_encode($responseCreator, JSON_PRETTY_PRINT);
        echo $jsonResponse;

        $recResp = addCustomerRecords("rfq-management", "Customerl_RFQ_Form_R_D", $jsonResponse);
        $recRespDe = json_decode($recResp, true);
        echo "Added! " .  json_encode($recRespDe);

        if($recRespDe["code"] == 3000){
            leavethePage('submission_sucessful');
        } else{
            leavethePage('submission_failed');
        }

        // 

    // Check if a file was uploaded and no errors occurred
    // if (isset($_FILES['enggFileDoc']) && $_FILES['enggFileDoc']['error'] == UPLOAD_ERR_OK) {
    //     // Attempt to move the uploaded file
    //     if (move_uploaded_file($_FILES['enggFileDoc']['tmp_name'], $uploadFile)) {
    //         echo "<p>File successfully uploaded to " . htmlspecialchars($uploadFile) . "</p>";

    //         // Example usage
    //         $repoOwner = 'YogeshMaz'; // Replace with your GitHub username or organization
    //         $repoName = 'customerportal'; // Replace with your repository name
    //         $filePath = 'media/' . $_FILES['enggFileDoc']['name']; // Path to the file in the repository

    //         $fileContent = fetchFileFromGitHub($repoOwner, $repoName, $filePath);

    //         // Output the file content (for demonstration purposes)
    //         echo "<pre>$fileContent</pre>";
    //     } else {
    //         echo "<p>Error moving the uploaded file.</p>";
    //     }
    // } else {
    //     // Handle file upload errors
    //     $errorMessages = [
    //         UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
    //         UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive specified in the HTML form.',
    //         UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded.',
    //         UPLOAD_ERR_NO_FILE => 'No file was uploaded.',
    //         UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder.',
    //         UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
    //         UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload.'
    //     ];
    //     $errorCode = $_FILES['enggFileDoc']['error'];
    //     $errorMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : 'Unknown upload error.';
    //     echo "<p>Error: " . htmlspecialchars($errorMessage) . "</p>";
    // }


    // Save form data or process as needed
    // Example: save data to database or send email

} else {
    echo "<p>Invalid request method. Please submit the form correctly.</p>";
}

function fetchFileFromGitHub($repoOwner, $repoName, $filePath, $branch = 'main') {
    // Construct the URL to the raw file content
    $url = "https://raw.githubusercontent.com/$repoOwner/$repoName/$branch/$filePath";
    
    // Fetch the file content
    $fileContent = file_get_contents($url);
    
    if ($fileContent === FALSE) {
        die('Error fetching file from GitHub');
    }

    return $fileContent;
}

// Function to print form data
function printFormData($data) {
    echo "<h3>Form Data</h3><ul>";
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            echo "<li><strong>$key:</strong><ul>";
            foreach ($value as $subKey => $subValue) {
                echo "<li>$subKey: " . htmlspecialchars($subValue) . "</li>";
            }
            echo "</ul></li>";
        } else {
            echo "<li><strong>$key:</strong> " . htmlspecialchars($value) . "</li>";
        }
    }
    echo "</ul>";
}

function leavethePage($action){
    // Redirect to upload_rfq.php
    header("Location: upload_rfq.php?formAction=" .$action);
    exit();
}

function createSignatureFilepathAndFiles(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['signature-data'])) {
            $dataURL = $_POST['signature-data'];
    
            // Extract the Base64 part of the data URL
            if (preg_match('/^data:image\/(\w+);base64,(.+)$/', $dataURL, $matches)) {
                $imageType = $matches[1];
                $imageData = base64_decode($matches[2]);
    
                // Define the upload directory and file name
                $uploadDir = '../media/auth_signature/';
                $fileName = uniqid() . '.' . $imageType;
                $filePath = $uploadDir . $fileName;
    
                // Ensure the upload directory exists
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
    
                // Save the image file
                if (file_put_contents($filePath, $imageData)) {
                    echo 'Signature saved as ' . htmlspecialchars($fileName);
                } else {
                    echo 'Failed to save the signature.';
                }
                return $fileName;
            } else {
                echo 'Invalid signature data.';
            }
        } else {
            echo 'No signature data received.';
        }
    } else {
        echo 'Invalid request method.';
    }
}

function createEnggDrawingFilepathAndFiles() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['enggFileDoc'])) {
            $file = $_FILES['enggFileDoc'];

            // Check for upload errors
            if ($file['error'] === UPLOAD_ERR_OK) {
                // Define the upload directory and file name
                $uploadDir = '../media/engg_drawings/';
                $fileName = uniqid() . '-' . basename($file['name']);
                $filePath = $uploadDir . $fileName;

                // Ensure the upload directory exists
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Move the uploaded file to the desired directory
                if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    echo 'Engg drawings document saved as ' . htmlspecialchars($fileName);
                    return $fileName;
                } else {
                    echo 'Failed to move the uploaded file.';
                }
            } else {
                echo 'File upload error: ' . $file['error'];
            }
        } else {
            echo 'No file uploaded.';
        }
    } else {
        echo 'Invalid request method.';
    }
}



?>

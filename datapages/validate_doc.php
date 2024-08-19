<?php
// Define the upload directory
$uploadDir = '../media/';
$uploadFile = $uploadDir . basename($_FILES['myfile']['name']);

// Ensure the uploads directory exists
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if a file was uploaded and no errors occurred
    if (isset($_FILES['myfile']) && $_FILES['myfile']['error'] == UPLOAD_ERR_OK) {
        // Attempt to move the uploaded file
        if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadFile)) {
            echo "<p>File successfully uploaded to " . htmlspecialchars($uploadFile) . "</p>";
            echo "file name : " . basename($_FILES['myfile']['name']);
            // Example usage
            $repoOwner = 'YogeshMaz'; // Replace with your GitHub username or organization
            $repoName = 'customerportal'; // Replace with your repository name
            $filePath = 'media/' . rawurlencode(basename($_FILES['myfile']['name'])); // Path to the file in the repository

            $fileContent = fetchFileFromGitHub($repoOwner, $repoName, $filePath);

            // Output the file content (for demonstration purposes)
            echo "<pre>$fileContent</pre>";
        } else {
            echo "<p>Error moving the uploaded file.</p>";
        }
    } else {
        // Handle file upload errors
        $errorMessages = [
            UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
            UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive specified in the HTML form.',
            UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded.',
            UPLOAD_ERR_NO_FILE => 'No file was uploaded.',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder.',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
            UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload.'
        ];
        $errorCode = $_FILES['myfile']['error'];
        $errorMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : 'Unknown upload error.';
        echo "<p>Error: " . htmlspecialchars($errorMessage) . "</p>";
    }
} else {
    echo "<p>Invalid request method. Please submit the form correctly.</p>";
}

function fetchFileFromGitHub($repoOwner, $repoName, $filePath, $branch = 'main') {
    // Construct the URL to the raw file content
    $url = "https://raw.githubusercontent.com/$repoOwner/$repoName/$branch/$filePath";
    echo "url ** " . $url . "\n";
    // Fetch the file content
    $fileContent = file_get_contents($url);

    if ($fileContent === FALSE) {
        die('Error fetching file from GitHub');
    }

    return $fileContent;
}





?>

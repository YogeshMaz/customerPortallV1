<?php
if (isset($_GET['url'])) {
    $url = urldecode($_GET['url']);

    // Check if the URL points to a PDF file
    if (strpos($url, '.pdf') !== false) {
        // Initialize a cURL session to fetch the file
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        // Get the file content
        $fileContent = curl_exec($ch);
        $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

        if ($fileContent !== false && $contentType == 'application/pdf') {
            $fileName = basename(parse_url($url, PHP_URL_PATH));

            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . strlen($fileContent));

            echo $fileContent;
            exit;
        } else {
            echo "Failed to fetch the PDF file.";
        }

        curl_close($ch);
    } else {
        echo "File is not a PDF.";
    }
} else {
    echo "No file URL specified.";
}
?>

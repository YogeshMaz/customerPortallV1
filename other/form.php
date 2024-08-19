<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Form</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h1>Simple Form</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process the form data and redirect to a confirmation page
      processForm();
      exit; // Stop further execution of this script to prevent additional processing or display of the form
    }
    
    // Check if the form is submitted
    function processForm() {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $file = $_FILES['File_Upload'];

      // Extract the file name
      $fileName = $file['name'];

      // Read file content and convert to base64
      $imagedata = file_get_contents($file['tmp_name']);
      $base64 = base64_encode($imagedata);

      // Debugging output to see the contents of the variables
      // echo '<pre>';
      // echo 'File Name: ' . $fileName . '<br>';
      // echo 'Name: ' . $name . '<br>';
      // echo 'Email: ' . $email . '<br>';
      // echo 'Base64: ' . $base64 . '...<br>'; // Print first 100 characters of base64 for brevity
      // echo '</pre>';

      // Function to add record using Zoho Creator API
      function addRecord($name, $email, $base64, $fileName) {
        $headers = [
          'Authorization: Zoho-oauthtoken 1000.db408db4ab016f8059c48f35724589a8.1ccd6386af53a8f373d878213eda449b',
          'Content-Type: application/json'
        ];

        $body = json_encode([
          'data' => [
            [
              'Name' => [
                'prefix' => 'Mr',
                'last_name' => 'Machine maze',
                'suffix' => '',
                'first_name' => $name
              ],
              'Email' => $email,
              'File_Name' => $fileName,
              'base_641' => $base64  // Include the base64 string
            ]
          ]
        ]);

        $ch = curl_init('https://creator.zoho.in/api/v2.1/arun.ramu_machinemaze/machinemaze-project-management/form/Trigger_user_data');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
          echo 'Error:' . curl_error($ch);
        } else {
          echo 'Response from Zoho Creator: ' . $response;
          header('Location: form.php');
          exit; // Stop further execution of this script
        }

        curl_close($ch);
      }

      // Call the function to add record if file upload is successful
      if ($file && $file['error'] == UPLOAD_ERR_OK) {
        addRecord($name, $email, $base64, $fileName);
      } else {
        echo 'File upload error.';
      }
    }

    ?>

    <form method="POST" action="" enctype="multipart/form-data">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" required>

      <label for="File_Upload">File:</label>
      <input type="file" class="form-control" id="File_Upload" name="File_Upload" required>

      <label for="phone">Phone:</label>
      <input type="tel" class="form-control" id="phone" name="phone" required>

      <button id="submit" class="btn btn-primary mt-2" type="submit">Submit</button>
    </form>
  </div>
  
</body>
</html>

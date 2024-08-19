<?php
include '../header.php';
include '../nav.php';
include '../footer.php';
?>
<style>
  a#showrfqtest span {
    color: #fff;
  }
  a#showrfqtest i {
    color: #fff;
  }
  li:has(> a#showrfqtest) {
      background: #0070ba;
  }
    
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Form</title>
</head>
<body>
    <h2>Upload Document</h2>
    <form method="POST" action="validate_doc.php" enctype="multipart/form-data">
        <label for="file">Select a file to upload:</label>
        <input type="file" name="myfile" id="file" />
        <input type="submit" value="Upload Document" />
    </form>
</body>
</html>


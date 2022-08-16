<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div style="background-color:#c9c9c9;padding:15px;">
</div>

<div align="center">
<form action="" method="post" enctype="multipart/form-data">
   <br>
    <b>Select image : </b>
    <input type="file" name="file" id="file" style="border: solid;">
    <input type="submit" value="Submit" name="submit">
</form>
</div>
<?php

if(isset($_POST["submit"])) {

    if (!isset($_FILES["file"])) {
        die("There is no file to upload.");
    }

    $filepath = $_FILES['file']['tmp_name'];
    $fileSize = filesize($filepath);
    $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
    $filetype = finfo_file($fileinfo, $filepath);

    if ($fileSize === 0) {
        die("The file is empty.");
    }

    if ($fileSize > 3145728) { // 3 MB (1 byte * 1024 * 1024 * 3 (for 3 MB))
        die("The file is too large");
    }

    $allowedTypes = [
        'image/png' => 'png',
        'image/jpeg' => 'jpg'
    ];

    if (!in_array($filetype, array_keys($allowedTypes))) {
        die("File not allowed.");
    }

    $filename = basename($filepath);
    $extension = $allowedTypes[$filetype];
    $targetDirectory = "uploads";

    $newFilepath = $targetDirectory . "/" . $filename . "." . $extension;

    if (!copy($filepath, $newFilepath)) {
        die("Can't move file.");
    }
    unlink($filepath);

    echo "File uploaded successfully :)";
}
?>
</body>
</html>
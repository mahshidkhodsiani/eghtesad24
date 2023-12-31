<?php
// Handle file upload
$targetDir = "uploads/"; // Specify your upload directory
$uploadedFileName = basename($_FILES["upload"]["name"]);
$targetFilePath = $targetDir . $uploadedFileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

// Allow certain file formats
$allowedTypes = array("jpg", "jpeg", "png", "gif");
if (in_array($fileType, $allowedTypes)) {
    if (move_uploaded_file($_FILES["upload"]["tmp_name"], $targetFilePath)) {
        // File uploaded successfully
        echo json_encode(array("url" => $targetFilePath));
    } else {
        echo json_encode(array("error" => "There was an error uploading your file."));
    }
} else {
    echo json_encode(array("error" => "Only JPG, JPEG, PNG, and GIF files are allowed."));
}
?>
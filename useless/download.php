<?php
session_start();
$page_title = "Downloads"; // Set the page title
ob_start(); // Start output buffering

// Path to the generated favicon
$icoFilePath = __DIR__ . '/favicons/favicon.ico';

// Check if file exists
if (file_exists($icoFilePath)) {
    // Set headers for download
    header('Content-Description: File Transfer');
    header('Content-Type: image/x-icon'); // Set correct MIME type for .ico files
    header('Content-Disposition: attachment; filename="favicon.ico"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($icoFilePath));

    // Clear any output before reading the file
    ob_clean();
    
    // Read and output the file
    readfile($icoFilePath);
    exit;
} else {
    $_SESSION['error_message'] = "File not found. Try converting again.";
    header("Location: upload.php");
    exit;
}

$page_content = ob_get_clean(); // Store the buffered content
include "layout.php"; // Include the layout
?>


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/chrisjean/php-ico/class-php-ico.php';

use WideImage\WideImage;

// Initialize variables
$message = '';
$originalFilename = '';
$resizedImagePath = '';
$icoFilePath = 'favicons/favicon.ico';
$uploadDirectory = __DIR__ . '/favicons/';
$webDirectory = 'favicons/'; // Path for browser display

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image']) && isset($_POST['sizes'])) {
    $image = $_FILES['image'];
    $selectedSizes = array_map('intval', $_POST['sizes']);

    if ($image['error'] !== 0) {
        $message = 'Error uploading file.';
    } elseif (empty($selectedSizes)) {
        $message = 'Please select at least one favicon size.';
    } else {
        // Ensure upload directory exists
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        // Get file extension & define file paths
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $originalFilename = $uploadDirectory . 'original.' . $extension;
        $resizedImagePath = $uploadDirectory . 'resized.png';

        // Move uploaded file
        if (move_uploaded_file($image['tmp_name'], $originalFilename)) {
            try {
                // Ensure the original image exists before processing
                if (file_exists($originalFilename)) {
                    $maxSize = max($selectedSizes);
                    $processedImage = WideImage::load($originalFilename)
                        ->resize($maxSize, $maxSize, 'outside')
                        ->crop("center", "middle", $maxSize, $maxSize);
                    $processedImage->saveToFile($resizedImagePath);
                } else {
                    $message = "Error: Original image not found.";
                }

                // Convert to ICO
                $sizeArray = array_map(fn($size) => [$size, $size], $selectedSizes);
                $ico = new PHP_ICO($resizedImagePath, $sizeArray);
                $ico->save_ico($icoFilePath);

                // Set success message
                $message = 'Favicon successfully created with sizes: ' . implode(', ', $selectedSizes) . '!';
            } catch (Exception $e) {
                $message = 'Error processing image: ' . $e->getMessage();
            }
        } else {
            $message = "Failed to move uploaded file.";
        }
    }
}
?>



   




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favicon Generator Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 2em;
            padding: 0em;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        header {
            width: 100%;
            background-color: #6ed3f8;
            color: white;
            padding: 10px 0;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        header h1 {
            margin: 0;
           font-size: 2em;
           color: blue;
           text-align: center;
           flex-grow: 1;

        }
        nav {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-size: 1.1em;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {

text-align: center;
background-color: rgb(221, 220, 220);
padding: 25px;
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
border-radius: 10px;
width:100%;
max-width: 1000px;
margin-top: 10px;
}

        .message {
            font-size: 1.2em;
            color: #333;
            margin-bottom: 20px;
        }

        .download-btn  {
            padding: 20px 20px;
            border: 2px;
            border-radius: 15px;
            font-size: 1.5em;
            cursor: pointer;
            width: 40%;
            margin: 5px;
        }
        .back-btn {


        }

        .download-btn {
            
            background-color: #007BFF; /* Match form.html */
            color: white;
        }

        .download-btn:hover {
            background-color:rgb(1, 58, 119);
            
            
        }

        .back-btn {
            padding: 10px 10px;
            border: 2px;
            border-radius: 15px;
            font-size: 1.5em;
            cursor: pointer;
            width: 30%;
            margin: 10px;            
            background-color: #1d852d; /* Match form.html */
            color: white;
        }

        .back-btn:hover {
            background-color: #28a745;
        }

        img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
            padding: 5px;
            background-color: #fff;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        footer {
            width: 100%;
            background-color: #4fc0e7;
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            align-content: space-around;
            align-items: center;
        }
    </style>
</head>
<body>

    <header>
        <h1>Favicon Generator</h1>
        <nav>
        <a href="./form.html">Home</a>
        <a href="./About.html">About</a>
            <a href="#">FAQ</a>
        </nav>
    </header>
    <h2>Favicon Generator Results</h2>

    <div class="container">
        <h2 class="message"><?php echo $message; ?></h2>

        <?php if (strpos($message, 'successfully') !== false): ?>
            <p>Click below to download your favicon:</p>
            <a href="favicons/favicon.ico" download="favicon.ico">
                <button class="download-btn">Download Favicon</button>
            </a>
            <hr>

            <!-- Preview the original image -->
            <p><strong>Original Image:</strong></p>
            <?php if (file_exists($originalFilename)): ?>
                <img src="<?= $webDirectory . 'original.' . $extension ?>?v=<?= time(); ?>" alt="Original Image">
            <?php else: ?>
                <p>Original image not found.</p>
            <?php endif; ?>
            <hr>

            <!-- Preview the resized image -->
            <p><strong>Resized Image:</strong></p>
            <?php if (file_exists($resizedImagePath)): ?>
                <img src="<?= $webDirectory ?>resized.png?v=<?= time(); ?>" alt="Resized Image">
            <?php else: ?>
                <p>Resized image not found.</p>
            <?php endif; ?>
        <?php endif; ?>

        <br>
        <a href="form.html">
            <button class="back-btn">Go Back to Upload</button>
        </a>
    </div>

    <footer>
        <p>&copy; 2025 Favicon Generator. All rights reserved.</p>
        <nav a>
            <a href="./form.html">Home</a>
            <a href="./About.html">About</a>
            <a href="#">FAQ</a>
        </nav a>
    </footer>

</body>
</html>

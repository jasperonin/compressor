<?php

require 'vendor/autoload.php';
include_once 'index.php';
 
// Include the iLovePDF library

use Ilovepdf\Ilovepdf;

if(isset($_POST['compression'])) {
    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $ilovepdf = new Ilovepdf($_ENV["PUBLIC_KEY"],$_ENV["SECRET_KEY"]);
    $myTaskCompress = $ilovepdf->newTask('compress');
    

    $uploadedFile = $_FILES['compress']; 


    $targetDirectory = "uploaded/";
   
    $targetFileName = $targetDirectory . basename($uploadedFile['name']);
    if(move_uploaded_file($uploadedFile['tmp_name'],$targetFileName)) {
        if($_FILES['compress']['error'] === UPLOAD_ERR_OK) {
             //will keep the original file before compressing
            $originalFile = $_FILES['compress']['name'];
            
             // Add files to task for upload
            $file1 = $myTaskCompress->addFile($targetFileName);
            // Execute the task
            $myTaskCompress->execute();
            // Download the package files
            $myTaskCompress->download();
            

            // Assuming $myTaskCompress->execute() and $myTaskCompress->download() are already executed

            // Get the list of compressed files after the task execution
            $compressedFiles = $myTaskCompress->getFiles();

            // Assuming you have an HTML template, start the HTML output
            echo "<div class='card mt-5 w-25 mx-auto'>";
            echo "<div class='card-header'> Download Compressed Files </div>";
            // Loop through the compressed files and create download links
            echo "<div class='card-body'>";
            foreach ($compressedFiles as $compressedFile) {
                // Generate a unique download link for each file
                $downloadLink = __DIR__.'/' . $compressedFile->filename; // Adjust the path
                
                // Display the download link
                echo "<a href='$downloadLink' download>" . $compressedFile->filename . "</a><br>";
            }
            echo "</div>";
            echo "</div>";
            // End the HTML output
            echo "</div>";


            echo "<script>alert('Compression Complete') </script>";
        } else {
            echo "ERROR";
        }
    }

}



?>
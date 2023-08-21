<?php

require 'vendor/autoload.php';
 
// Include the iLovePDF library

use Ilovepdf\Ilovepdf;

if(isset($_POST['compression'])) {
    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $ilovepdf = new Ilovepdf($_ENV["PUBLIC_KEY"],$_ENV["SECRET_KEY"]);
    $myTaskCompress = $ilovepdf->newTask('compress');

    $uploadedFile = $_FILES['compress']; 


    $targetDirectory = "uploaded/"; //will keep the original file before compressing
    $targetFileName = $targetDirectory . basename($uploadedFile['name']);
    if(move_uploaded_file($uploadedFile['tmp_name'],$targetFileName)) {
        if($_FILES['compress']['error'] === UPLOAD_ERR_OK) {
       
            $originalFile = $_FILES['compress']['name'];
             // Add files to task for upload
            $file1 = $myTaskCompress->addFile($targetFileName);
            // Execute the task
            $myTaskCompress->execute();
            // Download the package files
            $myTaskCompress->download();
            echo "<script>alert('Compression Complete') </script>";
        } else {
            echo "ERROR";
        }
    }

}



?>
<?php

require 'vendor/autoload.php';
 
// Include the iLovePDF library
use Ilovepdf\Ilovepdf;

if(isset($_POST['compression'])) {

    $ilovepdf = new Ilovepdf('project_public_cdf234f49040f66e3d18fc54ff91cf4a_07V3M59a8b24712557d07c515c7ea5dbb3a3e','secret_key_9e1db410433f8198c32f31d4c953c8dc_33f8be4a3a1d74ad4bec4443b17583775817a');
    $myTaskCompress = $ilovepdf->newTask('compress');
    if($_FILES['compress']['error'] === UPLOAD_ERR_OK) {
        $originalFile = $_FILES['compress']['name'];
         // Add files to task for upload
        $file1 = $myTaskCompress->addFile($originalFile);
        // Execute the task
        $myTaskCompress->execute();
        // Download the package files
        $myTaskCompress->download();
    } else {
        echo "ERROR";
    }


}



?>
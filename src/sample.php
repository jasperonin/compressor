<?php

    $scanned_files = __DIR__;
    $file_list = scandir($scanned_files);
    $allowedExtensions = array('pdf');

    echo "<ul>";
    foreach ($file_list as $file) {
        // Exclude "." (current directory) and ".." (parent directory)
        if ($file != "." && $file != "..") {
            $fileInfo = pathinfo($file);
    
            // Check if the file has an extension and if the extension is allowed
            if (isset($fileInfo['extension']) && in_array(strtolower($fileInfo['extension']), $allowedExtensions)) {
                $filePath = $scanned_files . '/' . $file; // Full path to the file
                echo "<li><a href='$filePath' download>$file</a></li>";
            }
        }
    }
    echo "</ul>";
?>
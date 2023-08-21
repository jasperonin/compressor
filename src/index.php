<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Compression</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
        /* Add CSS for the loading animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }

        .loading-spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
<body>
    <?php
        include_once 'compress.php';
        
    ?>
    <div class="container mt-5 w-50 ml-5">
        <h2 class="h3 text-center mb-3">Add File To Compress  </h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-10">
                    <input type="file" name="compress" class="form-control" style="border: 1px solid black">
                </div>
                <div class="col-2">
                    <input type="submit" name="compression" class="btn btn-success">
                </div>
            </div>
        </form>
       
    </div>
    
<div class="loading-overlay" id="loadingOverlay">
    <div class="loading-spinner"></div>
</div>
    
</body>
<script>
    // Show loading overlay when form is submitted
    document.querySelector("form").addEventListener("submit", function() {
        document.getElementById("loadingOverlay").style.display = "flex";
        
    });
</script>
</html>
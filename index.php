<?php
    include "image.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ASCII Converter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2 class="header text-center">ASCII Converter (Image to ASCII)</h2>
    <form class="form-inline form-block col-md-4 col-md-offset-4" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="file-load">Load image:</label>
            <input type="file" class="form-control fileToUpload" id="file-load" name="image">
        </div>
        <button type="submit" class="btn btn-primary" name="upload_img">Load</button>
    </form>
    
</body>
</html>
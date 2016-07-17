<?php
$directory = "img/";

if (isset($_POST["upload_img"]))
{
    $file = $_FILES["image"];
    $file_name = $file["name"];
    $file_type = $file["type"];
    $file_tmp_name = $file['tmp_name'];
    if (move_uploaded_file($file_tmp_name, $directory.$file_name))
    {
        $im = loadImage($directory.$file_name, $file_type);
        if ($im){
            echo "<span style='font-family: Courier New; line-height: 70%; font-size: 2px;'>";
            createASCII($im);
            echo "</span>";
        } else {
            echo "ERROR!";
        }

    }
}



function loadImage($destination, $type)
{
    echo $type;
    switch ($type) {
        case "image/jpeg":
            $im = imagecreatefromjpeg($destination);
            break;
        case "image/png":
            $im = imagecreatefrompng($destination);
            break;
        case "image/bmp":
            $im = imagecreatefromwbmp($destination);
            break;
        default:
            $im = null;
            break;
    }

    if(!$im)
    {
        echo "ERROR WHILE UPLOADING IMAGE";
    }

    return $im;
}
function createASCII($image)
{
    $X = imagesx($image);
    $Y = imagesy($image);

    if ($X < 400 and $Y < 400){
        for ($i = 0; $i < $Y; $i++) {
            for ($j = 0; $j < $X; $j++) {
                echo getASCIISymbol($image, $j, $i);
            }
            echo "<br>";
        }
    }
}

function getASCIISymbol($im, $x, $y){
    $palette = "$@B%8&WM#*oahkbdpqwmZO0QLCJUYXzcvunxrjft|()1{}[]?-_+~i!lI;:,^`.";
    $ASCII_MAX = 255;
    $rgb = imagecolorat($im, $x, $y);

    $colors = imagecolorsforindex($im, $rgb);
    $brightness = $colors["red"] + $colors["green"] + $colors["blue"];
    $BRIGHTNESS_MAX = $ASCII_MAX * 3;

    $index = intval((1.0*$brightness * strlen($palette))/($BRIGHTNESS_MAX));
    return substr($palette, $index, 1);
}
?>
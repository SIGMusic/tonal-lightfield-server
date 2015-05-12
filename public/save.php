<?php

$code = $_POST["code"];
$filename = $_POST["filename"];

if (strpos($filename, "/") !== false || substr($filename, -3) != ".py") {
    echo "Invalid filename";
} else {
    file_put_contents("scripts/$filename", stripcslashes($code));
    echo "Success";
}

?>
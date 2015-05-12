<?php

$filename = $_POST["filename"];
if (strpos($filename, "/") !== false) {
    echo "Invalid filename";
} elseif (!file_exists("scripts/$filename.py")) {
    echo "File does not exist";
} else {
    unlink("scripts/$filename.py");
    echo "Success";
}

?>
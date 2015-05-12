<?php

function filter_py($var) {
    return fnmatch("*.py", $var);
}

$dirlist = scandir("scripts");
$filtered = array_filter($dirlist, filter_py);
echo json_encode(array_values($filtered));

?>
<?php

$code = $_POST["code"];
$cmd = "echo \"".addslashes($code)."\" | python -u ../sandbox/exec.py";
$proc = proc_open($cmd, array(array('pipe', 'r'),
                              array('pipe', 'w'),
                              array('pipe', 'w')), $pipes);
fwrite($pipes[0], $input);
fclose($pipes[0]);

if (ob_get_level() == 0) ob_start();
echo "{\"stdout\":\"";

//Stream stdout to the client
while (($stdout = stream_get_line($pipes[1], 1024, "\n")) !== false) {
    echo addslashes($stdout)."\\n";

    //Flush the response
    ob_flush();
    flush();
}
fclose($pipes[1]);

echo "\",\"stderr\":";
$stderr = stream_get_contents($pipes[2]);
fclose($pipes[2]);
echo json_encode($stderr);
echo "}";

ob_end_flush();

?>
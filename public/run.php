<?php
$code = $_POST["code"];
$command = "echo \"".addslashes($code)."\" | python ../sandbox/exec.py";
echo shell_exec($command);
?>
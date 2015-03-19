<?php
$code = $_POST["code"];
echo "<h1>Input</h1>";
echo "<pre>";
echo $code;
echo "</pre>";
$command = "echo \"".addslashes($code)."\" | python ../sandbox/exec.py";
echo "<h1>Output</h1>";
echo "<pre>";
echo shell_exec($command);
echo "</pre>";
?>
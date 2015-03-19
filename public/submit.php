<?php include "../templates/header.php"; ?>

<div class="page-header">
    <h1>Input</h1>
</div>
<pre>
<?php
$code = $_POST["code"];
echo $code;
?>
</pre>

<div class="page-header">
    <h1>Output</h1>
</div>
<pre>
<?php
$command = "echo \"".addslashes($code)."\" | python ../sandbox/exec.py";
echo shell_exec($command);
?>
</pre>

<?php include "../templates/footer.php"; ?>
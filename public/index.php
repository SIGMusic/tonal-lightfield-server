<?php include "../templates/header.php"; ?>
<form action="submit.php" method="POST" class="container-fluid">
    Enter your Python script below.
    <textarea name="code" id="code" class="form-control" rows="16"></textarea>
    <br>
    <input type="submit" class="btn btn-primary" value="Run" />
</form>
<?php include "../templates/footer.php"; ?>
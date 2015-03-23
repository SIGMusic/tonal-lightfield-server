<?php include "../templates/header.php"; ?>

<div class="container-fluid">
    <div class="row" id="code-row">
        <div class="col-md-12">
            <textarea name="code" id="code" class="form-control"
                autocomplete="off" autocorrect="off"
                autocapitalize="off" spellcheck="false"></textarea>
            <div class="alert alert-info" role="alert" id="loading-message">
                Running...
            </div>
            <div class="alert alert-danger alert-dismissible" role="alert" id="error-message">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Error!
            </div>
        </div>
    </div>
    <div class="row" id="out-row">
        <div class="col-md-6">
            <span class="label label-primary">Output</span>
            <pre id="output"></pre>
        </div>
        <div class="col-md-6">
            <span class="label label-danger">Errors</span>
            <pre id="errors"></pre>
        </div>
    </div>
</div>

<?php include "../templates/footer.php"; ?>
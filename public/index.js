//Global options
var options = {};

//The editor object
var editor;

//Set up the code entry block
function setupEditor() {
    editor = CodeMirror.fromTextArea(
        document.getElementById("code"),
        {
            autofocus: true,
            theme: options.theme,
            keyMap: options.keybinding,
            indentUnit: options.indentSize,
            indentWithTabs: !options.indentWithSpaces,
            smartIndent: options.smartIndent,
            lineNumbers: options.lineNumbers,
            lineWrapping: options.lineWrapping,
            matchBrackets: options.matchBrackets,
            autoCloseBrackets: options.autoCloseBrackets,
            styleActiveLine: options.highlightCurrentLine,
        }
    );
}

//Restore options
function restoreOptions() {
    //Theme
    options.theme = localStorage["theme"];
    if (options.theme == undefined) {
        options.theme = "default";
    }
    $("#theme-name").text(options.theme);

    //Keybinding
    options.keybinding = localStorage["keybinding"];
    if (options.keybinding == undefined) {
        options.keybinding = "default";
    }
    $("#keybinding-name").text(options.keybinding);

    //Indent size
    options.indentSize = parseInt(localStorage["indentSize"]);
    if (isNaN(options.indentSize)) {
        options.indentSize = 4;
    }
    $("#indent-size-value").text(options.indentSize);

    //Indent with spaces
    options.indentWithSpaces = (localStorage["indentWithSpaces"] == "false" ? false : true);
    $("#indent-with-spaces-checkbox").prop("checked", options.indentWithSpaces);

    //Smart indent
    options.smartIndent = (localStorage["smartIndent"] == "false" ? false : true);
    $("#smart-indent-checkbox").prop("checked", options.smartIndent);

    //Line numbers
    options.lineNumbers = (localStorage["lineNumbers"] == "false" ? false : true);
    $("#line-numbers-checkbox").prop("checked", options.lineNumbers);

    //Line wrapping
    options.lineWrapping = (localStorage["lineWrapping"] == "false" ? false : true);
    $("#line-wrapping-checkbox").prop("checked", options.lineWrapping);

    //Match brackets
    options.matchBrackets = (localStorage["matchBrackets"] == "false" ? false : true);
    $("#match-brackets-checkbox").prop("checked", options.matchBrackets);

    //Auto close brackets
    options.autoCloseBrackets = (localStorage["autoCloseBrackets"] == "false" ? false : true);
    $("#auto-close-brackets-checkbox").prop("checked", options.autoCloseBrackets);

    //Highlight current line
    options.highlightCurrentLine = (localStorage["highlightCurrentLine"] == "false" ? false : true);
    $("#highlight-current-line-checkbox").prop("checked", options.highlightCurrentLine);
}



//Event listeners
$("#run-button").click(function() {
    $.ajax({
        type: "POST",
        url: "run.php",
        data: {
            code: editor.getValue()
        },
        success: function(data) {
            $("#output").text(data);
        }
    });
});

//Options
$("#theme-dropdown a").click(function(e) {
    var theme = e.target.innerHTML;
    editor.setOption("theme", theme);
    localStorage["theme"] = theme;
    $("#theme-name").text(theme);
});

$("#keybinding-dropdown a").click(function(e) {
    var keybinding = e.target.innerHTML;
    editor.setOption("keyMap", keybinding);
    localStorage["keybinding"] = keybinding;
    $("#keybinding-name").text(keybinding);
});

$("#indent-size-dropdown a").click(function(e) {
    var indentSize = e.target.innerHTML;
    editor.setOption("indentUnit", indentSize);
    localStorage["indentSize"] = indentSize;
    $("#indent-size-value").text(indentSize);
});

$("#indent-with-spaces-checkbox").on("change", function(e) {
    var indentWithSpaces = e.target.checked;
    editor.setOption("indentWithTabs", !indentWithSpaces);
    localStorage["indentWithSpaces"] = indentWithSpaces;
});

$("#smart-indent-checkbox").on("change", function(e) {
    var smartIndent = e.target.checked;
    editor.setOption("smartIndent", smartIndent);
    localStorage["smartIndent"] = smartIndent;
});

$("#line-numbers-checkbox").on("change", function(e) {
    var lineNumbers = e.target.checked;
    editor.setOption("lineNumbers", lineNumbers);
    localStorage["lineNumbers"] = lineNumbers;
});

$("#line-wrapping-checkbox").on("change", function(e) {
    var lineWrapping = e.target.checked;
    editor.setOption("lineWrapping", lineWrapping);
    localStorage["lineWrapping"] = lineWrapping;
});

$("#match-brackets-checkbox").on("change", function(e) {
    var matchBrackets = e.target.checked;
    editor.setOption("matchBrackets", matchBrackets);
    localStorage["matchBrackets"] = matchBrackets;
});

$("#auto-close-brackets-checkbox").on("change", function(e) {
    var autoCloseBrackets = e.target.checked;
    editor.setOption("autoCloseBrackets", autoCloseBrackets);
    localStorage["autoCloseBrackets"] = autoCloseBrackets;
});

$("#highlight-current-line-checkbox").on("change", function(e) {
    var highlightCurrentLine = e.target.checked;
    editor.setOption("styleActiveLine", highlightCurrentLine);
    localStorage["highlightCurrentLine"] = highlightCurrentLine;
});



//Initialization
restoreOptions();
setupEditor();

<?php
$title = "Lights Scripting IDE";
$short_title = "Lights Scripting";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <script src="lib/codemirror-5.0/lib/codemirror.js"></script>

    <!-- CodeMirror addons -->
    <script src="lib/codemirror-5.0/addon/selection/active-line.js"></script>
    <script src="lib/codemirror-5.0/addon/edit/matchbrackets.js"></script>
    <script src="lib/codemirror-5.0/addon/edit/closebrackets.js"></script>
    <script src="lib/codemirror-5.0/keymap/vim.js"></script>
    <script src="lib/codemirror-5.0/keymap/emacs.js"></script>
    <script src="lib/codemirror-5.0/keymap/sublime.js"></script>


    <link rel="stylesheet" href="lib/codemirror-5.0/lib/codemirror.css">

    <!-- CodeMirror themes -->
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/3024-day.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/3024-night.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/ambiance.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/base16-dark.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/base16-light.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/blackboard.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/cobalt.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/colorforth.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/eclipse.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/elegant.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/erlang-dark.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/lesser-dark.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/mbo.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/mdn-like.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/midnight.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/monokai.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/neat.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/neo.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/night.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/paraiso-dark.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/paraiso-light.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/pastel-on-dark.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/rubyblue.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/solarized.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/the-matrix.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/tomorrow-night-bright.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/tomorrow-night-eighties.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/twilight.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/vibrant-ink.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/xq-dark.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/xq-light.css">
    <link rel="stylesheet" href="lib/codemirror-5.0/theme/zenburn.css">

    <!-- CodeMirror languages -->
    <script src="lib/codemirror-5.0/mode/python/python.js"></script>

    <link rel="stylesheet" href="index.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!-- Combine brand with collapse button for small screens -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?php echo $short_title ?></a>
            </div>

            <!-- Collect nav items on small screens -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            File <span class="glyphicon glyphicon-triangle-bottom"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu"> -->
                            <!-- <li><a href="#" id="load-button">
                                <span class="glyphicon glyphicon-folder-open"></span> Load
                            </a></li>
                            <li><a href="#" id="save-button">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Save
                            </a></li> -->
                        <!-- </ul>
                    </li> -->
                    <!-- <li><a href="#" id="simulate-button"><span class="glyphicon glyphicon-check"></span> Simulate</a></li> -->
                    <li><a href="#" id="run-button"><span class="glyphicon glyphicon-play"></span> Run</a></li>
                    <li><a href="#" id="output-button"><span class="glyphicon glyphicon-console"></span> Toggle Output</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#options-modal"><span class="glyphicon glyphicon-cog"></span> Options</a></li>
                    <li><a href="https://github.com/SIGMusic/tonal-lightfield-server/wiki/Light-Scripting-Help" target="_blank"><span class="glyphicon glyphicon-question-sign"></span> Help</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="options-modal" tabindex="-1" role="dialog" aria-labelledby="options-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="options-modal-label">Options</h4>
              </div>
              <div class="modal-body">
                    Theme:
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span id="theme-name">default</span>
                            <span class="caret"></span>
                        </button>
                        <ul id="theme-dropdown" class="dropdown-menu" role="menu">
                            <li><a href="#">default</a></li>
                            <li class="divider"></li>
                            <li><a href="#">3024-day</a></li>
                            <li><a href="#">3024-night</a></li>
                            <li><a href="#">ambiance</a></li>
                            <li><a href="#">base16-dark</a></li>
                            <li><a href="#">base16-light</a></li>
                            <li><a href="#">blackboard</a></li>
                            <li><a href="#">cobalt</a></li>
                            <li><a href="#">colorforth</a></li>
                            <li><a href="#">eclipse</a></li>
                            <li><a href="#">elegant</a></li>
                            <li><a href="#">erlang-dark</a></li>
                            <li><a href="#">lesser-dark</a></li>
                            <li><a href="#">mbo</a></li>
                            <li><a href="#">mdn-like</a></li>
                            <li><a href="#">midnight</a></li>
                            <li><a href="#">monokai</a></li>
                            <li><a href="#">neat</a></li>
                            <li><a href="#">neo</a></li>
                            <li><a href="#">night</a></li>
                            <li><a href="#">paraiso-dark</a></li>
                            <li><a href="#">paraiso-light</a></li>
                            <li><a href="#">pastel-on-dark</a></li>
                            <li><a href="#">rubyblue</a></li>
                            <li><a href="#">solarized dark</a></li>
                            <li><a href="#">solarized light</a></li>
                            <li><a href="#">the-matrix</a></li>
                            <li><a href="#">tomorrow-night-bright</a></li>
                            <li><a href="#">tomorrow-night-eighties</a></li>
                            <li><a href="#">twilight</a></li>
                            <li><a href="#">vibrant-ink</a></li>
                            <li><a href="#">xq-dark</a></li>
                            <li><a href="#">xq-light</a></li>
                            <li><a href="#">zenburn</a></li>
                        </ul>
                    </div>
                    <br>
                    Keybindings:
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span id="keybinding-name">default</span>
                            <span class="caret"></span>
                        </button>
                        <ul id="keybinding-dropdown" class="dropdown-menu" role="menu">
                            <li><a href="#">default</a></li>
                            <li class="divider"></li>
                            <li><a href="#">vim</a></li>
                            <li><a href="#">emacs</a></li>
                            <li><a href="#">sublime</a></li>
                        </ul>
                    </div>
                    <br>
                    Font size:
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span id="font-size-value">11</span>pt
                            <span class="caret"></span>
                        </button>
                        <ul id="font-size-dropdown" class="dropdown-menu" role="menu">
                            <li><a href="#">8</a></li>
                            <li><a href="#">9</a></li>
                            <li><a href="#">10</a></li>
                            <li><a href="#">11</a></li>
                            <li><a href="#">12</a></li>
                            <li><a href="#">13</a></li>
                            <li><a href="#">14</a></li>
                            <li><a href="#">16</a></li>
                            <li><a href="#">18</a></li>
                            <li><a href="#">20</a></li>
                            <li><a href="#">24</a></li>
                            <li><a href="#">28</a></li>
                            <li><a href="#">32</a></li>
                            <li><a href="#">36</a></li>
                            <li><a href="#">48</a></li>
                        </ul>
                    </div>
                    <br>
                    Indent size:
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span id="indent-size-value">4</span>
                            <span class="caret"></span>
                        </button>
                        <ul id="indent-size-dropdown" class="dropdown-menu" role="menu">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                            <li><a href="#">8</a></li>
                        </ul>
                    </div>
                    <br>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="indent-with-spaces-checkbox"> Indent with spaces
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="smart-indent-checkbox"> Smart indent
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="line-numbers-checkbox"> Display line numbers
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="line-wrapping-checkbox"> Wrap lines
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="match-brackets-checkbox"> Match brackets
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="auto-close-brackets-checkbox"> Auto-close brackets
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="highlight-current-line-checkbox"> Highlight current line
                        </label>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
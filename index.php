<!DOCTYPE html>
<html>
    <head>
    <title>note</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="shortcut icon" href="fig/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/open.css" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script>
            function checkValid() {
                var filename = $('#filename').val();
                if(filename == '' || filename.match(/[\\]/))
                    $('form').attr('action', '');
            }
            $(function() {
                $('#button').click(function() {
                    checkValid();
                });
                $('#filename').keypress(function(evt) { 
                    if(evt.keyCode != 13) // enter key
                        return;
                    checkValid();
                });
                $('#filename').focus();
            });
        </script>
    </head>

    <body>
        <div id="container">
            <div id="top"></div>
            <div id="middle">
                <div id="left"></div>
                <div id="files">
                    <table>
<?php
require_once "php/ls.php";
$numCol = 4;
$files = array();
exec("ls -t page", $files);
for($i = 0; $i < count($files) / $numCol; ++ $i) {
    echo '<tr>';
    for($j = 0; $j < $numCol; ++ $j) {
        $idx = $i * $numCol + $j;
        if($idx >= count($files))
            break;
        echo '<td><a href="note.php?p=' . $files[$idx] . '"><img src="fig/open_file.png"> ' . $files[$idx] . '</a></td>';
    }
    echo '</tr>';
}
?>
                    </table>
                </div>
                <div id="right"></div>
            </div>
            <div id="bottom">
                <form action="note.php" method="get">
                    <input name="p" type="text" id="filename" />
                    <input type="submit" id="button" value="" />
                </form>
            </div>
        </div>
    </body>
</html>


<?php
$page_dir = "page/";
$page = "default";
if(isset($_GET['p']) and $_GET['p'] != "")
    $page = $_GET['p'];

if(file_exists($page_dir . $page))
    $handle = fopen($page_dir . $page, "r");
?>

<!DOCTYPE html>
<html>
    <head>
    <title>note - <?php echo $page; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="shortcut icon" href="fig/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/note.css" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <!-- the following javascript should not be in a separated file -->
        <script>
            var page;
            var idInt;
            $(function() {
                page = "<? echo $page; ?>";
                idInt = -1;

                $('textarea').keyup(function() {
                    if(idInt != -1)
                        clearInterval(idInt);
                    var content = $('textarea').val();
                    idInt = setInterval(function() {
                        $.post("php/write.php", {'page': page, 'content': content});
                    }, 1000);
                });
                $('textarea').focus();
            });
        </script>
    </head>

    <body>
        <div id="container">
            <div id="top"></div>
            <div id="middle">
                <div id="left"></div>
                <div id="note">
                    <textarea><?php if(isset($handle)) fpassthru($handle); ?></textarea>
                </div>
                <div id="right"></div>
            </div>
            <div id="bottom"></div>
        </div>
    </body>
</html>


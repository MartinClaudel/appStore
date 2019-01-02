<!DOCTYPE html [<!ATTLIST a data_url CDATA #IMPLIED>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css<?php echo DIRECTORY_SEPARATOR ?>style.css">
        <title><?php echo $pagetitle ?></title>
    </head>
    <body>
        <div id="pageChanger"></div>
        <header> <a href="index.php?controller=app&action=board">APP BOARD</a>
        </header>
        <?php require_once Util::build_path(array('view', $controller, $view . '.php'));    ?>
        <footer>
            <script type="text/javascript" src="js<?php echo DIRECTORY_SEPARATOR ?>script.js"></script>
            appStore prototype
        </footer>
    </body>
</html>

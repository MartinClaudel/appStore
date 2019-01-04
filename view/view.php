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
        <div id="overlay" class="hidden"></div>
        <header><a href="index.php">  HOME  </a> <a href="index.php?controller=app&action=board">APP BOARD</a>
        </header>
        <main>
            <?php require_once Util::build_path(array('view', $controller, $view . '.php')); ?>
        </main>
        <footer>
            <script type="text/javascript" src="js<?php echo DIRECTORY_SEPARATOR ?>functions.js"></script>
            <script type="text/javascript" src="js<?php $action = (isset($_GET['action']) && !is_null($_GET['action'])) ? $_GET['action'] : 'store';
            echo DIRECTORY_SEPARATOR . $action ?>.js"></script>
            appStore prototype
        </footer>
    </body>
</html>

<?php

//If not defined, preparing default behaviors
$controller = !isset($_GET['controller']) || is_null($_GET['controller']) ? 'app' : $_GET['controller'];
$action = !isset($_GET['action']) || is_null($_GET['action']) ? 'store' : $_GET['action'];

$controllerClass = 'controller' . ucfirst($controller);

//If the script file named $controllerClass.'.php' exists
if (file_exists(Util::build_path(array('controller', $controllerClass . '.php')))) {
    require_once Util::build_path(array('controller', $controllerClass . '.php'));
    if (class_exists($controllerClass) && in_array($action, get_class_methods($controllerClass))) {//If the class exists as well as the action
        $controllerClass::$action();
    } else {
        $view = "error";
        $controller = '.';
        require_once Util::build_path(array('view', 'view.php'));
    }
} else {
    $view = "error";
    $controller = '.';
    require_once Util::build_path(array('view', 'view.php'));
}

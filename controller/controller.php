<?php



if((!isset($_GET['controller']) || is_null($_GET['controller'])) && (!isset($_POST['controller']) || is_null($_POST['controller']))){ 
    $controller='app';
}else{
    $controller=(is_null($_GET['controller']) ? $_POST['controller'] : $_GET['controller']);
}

if((!isset($_GET['action']) || is_null($_GET['action'])) && (!isset($_GET['action']) || is_null($_POST['action']))){ 
    $action='readAll';
}else{
    $action=(is_null($_GET['action']) ? $_POST['action'] : $_GET['action']);
}


$controllerClass='controller'. ucfirst($controller);

require_once Util::build_path(array('controller',$controllerClass.'.php'));

if(class_exists($controllerClass) && in_array($action, get_class_methods($controllerClass))){
    $controllerClass::$action();
}else{
    $view="error";
    $controller='.';    
    require_once Util::build_path(array('view','view.php'));
}


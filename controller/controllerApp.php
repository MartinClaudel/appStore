<?php

require_once Util::build_path(array('model','modelApp.php'));

class controllerApp{
    
    public static function readAll(){
        $arr=App::selectAll();
        $view='list';
        $controller='app';
        require_once Util::build_path(array('view','view.php'));
    }
    
    public static function read(){
        $app=App::select($_GET['id']);
        require_once Util::build_path(array('view','app','detail.php'));
    }
    
    public static function board(){
        $view='board';
        $controller='app';
        require_once Util::build_path(array('view','view.php'));
    }
    
}

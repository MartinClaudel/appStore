<?php

require_once Util::build_path(array('model', 'modelApp.php'));

class controllerApp {

    public static function readAll() {
        $arr = App::selectAll();
        $view = 'store';
        $controller = 'app';
        require_once Util::build_path(array('view', 'view.php'));
    }

    public static function read() {
        $app = App::select($_GET['id']);
        require_once Util::build_path(array('view', 'app', 'template-parts', 'detail.php'));
    }

    public static function board() {
        $arr = App::selectAll();
        $view = 'board';
        $controller = 'app';
        require_once Util::build_path(array('view', 'view.php'));
    }
    
    public static function create(){
        $view='updateForm';
        $action="created";
        $controller='app';
        $keyword='action';
        require_once Util::build_path(array('view','app','template-parts','updateForm.php'));
    }
    
    public static function created(){
        
        $success=App::save(array(
                "ID"=> substr(md5(uniqid("ID", true)),0,25),
                "pckg"=>$_POST['package'],
                "OS"=>$_POST['OS'],
                "ver"=>$_POST['version'],
                "name"=>$_POST['nom'],
                "description"=>$_POST['description'],
                "image_link"=> isset($_POST['image_link']) ? $_POST['image_link'] :     NULL
                ));
        return $success;
    }
    
    public static function update(){
        $action='updated';
        $keyword="Mettre à jour";
        $app=App::select($_GET['id']);
    }
    
    public static function updated(){
       $success=App::update(array(
                "ID"=> substr(md5(uniqid("ID", true)),0,25),
                "pckg"=>$_POST['package'],
                "OS"=>$_POST['OS'],
                "ver"=>$_POST['version'],
                "name"=>$_POST['nom'],
                "description"=>$_POST['description'],
                "image_link"=> isset($_POST['image_link']) ? $_POST['image_link'] :     NULL
                ));
        return $success;
    }

}

<?php

require_once Util::build_path(array('model', 'modelCategory.php'));

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class controllerCategory{
    
    public static function readAll(){
        $catgeories=Category::selectAll();
        require Util::build_path(array('view','category','template-parts','list.php'));
    }
    
    public static function create(){
        $action="created";
        $keyword='Créer';
        require Util::build_path(array('view','category','template-parts','updateForm.php'));
    }
    
    public static function created(){
        Category::save(array(
            "ID"=>substr(md5(uniqid("IDC", true)),0,25),
            "name"=>$_POST['nom'],
            "OS"=>$_POST['OS'])
               );
    }
}
<?php

require_once Util::build_path(array('model', 'modelCategory.php'));

/*
 * Contains all actions regarding the Category object
 */

class controllerCategory {

    /**
     * List action, requires app list view
     */
    public static function readAll() {
        $categories = Category::selectAll();
        require Util::build_path(array('view', 'category', 'template-parts', 'list.php'));
    }

    /**
     * Creation action, requires creation form
     */
    public static function create() {
        $action = "created";
        $keyword = 'Créer';
        require Util::build_path(array('view', 'category', 'template-parts', 'updateForm.php'));
    }

    /**
     * Creation action, saves the category
     */
    public static function created() {
        Category::save(array(
            "ID" => substr(md5(uniqid("IDC", true)), 0, 25),
            "name" => $_POST['nom'],
            "OS" => $_POST['OS'])
        );
    }

    /**
     * Update action, requires update form
     */
    public static function update() {
        $category = Category::select($_GET['c']);
        var_dump($_GET);
        $action = 'updated';
        $keyword = 'Enregistrer';
        require_once Util::build_path(array('view', 'category', 'template-parts', 'updateForm.php'));
    }

    /**
     * Update action, saves the changes
     */
    public static function updated() {
        Category::update(array(
            "ID" => $_POST['id'],
            "name" => $_POST['nom'],
            "OS" => $_POST['OS']
        ));
    }

}

<?php

require_once Util::build_path(array('model', 'modelApp.php'));
require_once Util::build_path(array('model', 'modelCategory.php'));

/*
 * Contains all actions regarding the App object
 */

class controllerApp {

    /**
     * List action, requires app list view
     */
    public static function readAll() {
        $arr = App::selectAll();
        require_once Util::build_path(array('view', 'app', 'template-parts', 'list.php'));
    }

    /**
     * Reading action, requires app detail view
     */
    public static function read() {
        $app = App::select($_GET['id']);
        require_once Util::build_path(array('view', 'app', 'template-parts', 'detail.php'));
    }

    /**
     * Display the admin board view
     */
    public static function board() {
        $arr = App::selectAll();
        $view = 'board';
        $controller = 'app';
        $pagetitle = 'Board';
        require_once Util::build_path(array('view', 'view.php'));
    }

    /**
     * Display the store view
     */
    public static function store() {
        $arr = App::selectAll();
        $view = 'store';
        $controller = 'app';
        $pagetitle = 'Store';
        require_once Util::build_path(array('view', 'view.php'));
    }

    /**
     * Creation action, requires creation form
     */
    public static function create() {
        $action = "created";
        $keyword = 'Créer';
        require_once Util::build_path(array('view', 'app', 'template-parts', 'updateForm.php'));
    }

    /**
     * Creation action, saves the app
     */
    public static function created() {

        $success = App::save(array(
                    "ID" => substr(md5(uniqid("IDA", true)), 0, 25),
                    "pckg" => $_POST['package'],
                    "OS" => $_POST['OS'],
                    "ver" => $_POST['version'],
                    "name" => $_POST['nom'],
                    "description" => $_POST['description'],
                    "image_link" => isset($_POST['ImageLink']) ? $_POST['ImageLink'] : NULL
        ));
        return $success;
    }

    /**
     * Update action, requires update form
     */
    public static function update() {
        $action = 'updated';
        $keyword = "Mettre à jour";
        $app = App::select($_GET['id']);
        $button_label = "mettre à jour";
        require_once Util::build_path(array('view', 'app', 'template-parts', 'updateForm.php'));
    }

    /**
     * Update action, saves the changes
     */
    public static function updated() {
        $success = App::update(array(
                    "ID" => $_POST['id'],
                    "pckg" => $_POST['package'],
                    "OS" => $_POST['OS'],
                    "ver" => $_POST['version'],
                    "name" => $_POST['nom'],
                    "description" => $_POST['description'],
                    "image_link" => isset($_POST['ImageLink']) ? $_POST['ImageLink'] : NULL
        ));
    }

    /**
     * Delete action, requires confirmation form
     */
    public static function delete() {
        require_once Util::build_path(array('view', 'app', 'template-parts', 'deleteForm.php'));
    }

    /**
     * Delete action, deletes the app
     */
    public static function deleted() {
        App::delete($_GET['id']);
    }

    /**
     * List categories for an app
     */
    public static function readAppCategories() {
        $categoriesByApp = App::selectCategoriesByAppId($_GET['id']);
        $categories = Category::selectAll();
        $editable = (isset($_GET['edit']) && !is_null($_GET['edit'])) ? $_GET['edit'] : false;
        require Util::build_path(array('view', 'category', 'template-parts', 'list.php'));
    }

    /**
     * Add a category to an app
     */
    public static function addAppCategory() {
        App::addApptoCategory($_GET['a'], $_GET['c']);
    }

    /**
     * Remove a category from an app
     */
    public static function removeAppCategory() {
        App::removeAppfromCategory($_GET['a'], $_GET['c']);
    }

}

<?php

class App extends Model {

    public static $object = 'app';
    public static $primary = 'ID';
    private $ID;
    private $pckg;
    private $OS;
    private $ver;
    private $name;
    private $description;
    private $image_link;

    /**
     * Creates an App object
     *  
     * @param  array $data The key array containing the object's data
     */
    public function __construct($data = NULL) {
        if (!is_null($data)) {
            $this->ID = $data["ID"];
            $this->pckg = $data["pckg"];
            $this->OS = $data["OS"];
            $this->ver = $data["ver"];
            $this->name = $data["name"];
            $this->desccription = $data["description"];
            $this->image_link = $data['image_link'];
        }
    }

    /**
     * Generic getter
     *  
     * @param  string $key The attribute to get the value from
     * @return value
     */
    public function get($key) {
        return $this->$key;
    }

    /**
     * Returns an array of categories objects for a certain app
     *  
     * @param  string $appID The app's ID
     * @return array
     */
    public static function selectCategoriesByAppId($appID) {
        $sql = "SELECT c.* FROM category c JOIN appbycategory ca ON c.ID=ca.categoryID WHERE ca.appID=:id";
        try {
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute(array(
                'id' => $appID
            ));
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Category');
            return $req_prep->fetchAll();
        } catch (PDOException $e) {
            if (Conf::getDebug())
                echo $e;
        }
    }

    /**
     * Associate an app with a category
     * @param  array $appID The app's ID
     * @param  array $categoryID The catgory's ID
     * @return boolean
     */
    public static function addApptoCategory($appID, $categoryID) {
        $sql = "INSERT INTO appbycategory (appID,categoryID) VALUES(:appID,:categoryID)";
        try {
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute(array(
                'appID' => $appID,
                'categoryID' => $categoryID
            ));
            return true;
        } catch (PDOException $e) {
            if (Conf::getDebug())
                echo $e;
            return false;
        }
    }

    /**
     * Remove an association between an app and a category
     * @param  array $appID The app's ID
     * @param  array $categoryID The catgory's ID
     * @return boolean
     */
    public static function removeAppfromCategory($appID, $categoryID) {
        $sql = "DELETE FROM appbycategory WHERE appID=:appID AND categoryID=:categoryID";
        try {
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute(array(
                'appID' => $appID,
                'categoryID' => $categoryID
            ));
            return true;
        } catch (PDOException $e) {
            if (Conf::getDebug())
                echo $e;
            return false;
        }
    }

}

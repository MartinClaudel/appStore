<?php

/**
 * Contains all the functions interacting with the database
 */
class Model {

    public static $pdo;

    /**
     * Initialize a database connection as a PDO object
     */
    public static function Init() {
        try {
            self::$pdo = new PDO("mysql:host=" . Conf::get("host") . ";dbname=" . Conf::get("dbname"), Conf::get("login"), Conf::get("psswd"), array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            if (Conf::getDebug())
                echo $e;
            echo "Database connection error";
        }
    }

    /**
     * Returns all objects from a certain type
     * @return array
     */
    public static function selectAll() {
        $sql = "SELECT * FROM " . static::$object;
        try {
            $rep = self::$pdo->query($sql);
            $rep->setFetchMode(PDO::FETCH_CLASS, ucfirst(static::$object));
            return $rep->fetchAll();
        } catch (PDOException $e) {
            if (Conf::getDebug())
                echo $e;
        }
    }

    /**
     * Returns an object of a certain type by his id
     *  
     * @param  array $id The object's ID
     * @return object
     */
    public static function select($id) {
        $sql = "SELECT * FROM " . static::$object . " WHERE " . static::$primary . "=:id;";
        try {
            $req_prep = self::$pdo->prepare($sql);
            $req_prep->execute(array(
                'id' => $id
            ));
            $req_prep->setFetchMode(PDO::FETCH_CLASS, ucfirst(static::$object));
            return $req_prep->fetch();
        } catch (PDOException $e) {
            if (Conf::getDebug())
                echo $e;
        }
    }

    /**
     * Saves the input data into the database
     *  
     * @param  array $data The data to save
     * @return boolean
     */
    public static function save($data) {

        $table_name = static::$object;
        $statements = array();
        foreach ($data as $key => $p) {
            if (isset($data[$key]) && !is_null($data[$key]) && strlen($p) > 0) {
                $statements[$key] = $p;
            }
        }
        $sql = "INSERT INTO {$table_name} (" . implode(',', array_keys($statements)) . ") VALUES (:" . implode(',:', array_keys($statements)) . ")";
        try {
            $req_prep = self::$pdo->prepare($sql);
            $req_prep->execute($statements);
            return true;
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
                return false;
            } else {
                echo 'De quoi un crash serveur ? j\'ai rien vu moi';
            }
            die();
        }
    }

    /**
     * Updates the database with the input data
     *  
     * @param  array $data The new data
     * @return boolean
     */
    public static function update($data) {
        $table_name = static::$object;
        $primary = static::$primary;
        $statements = array();
        $values = array();
        foreach ($data as $key => $p) {
            if (isset($data[$key]) && !is_null($data[$key]) && strlen($p) > 0) {//si initialisé et  non null et longeur supérieur à zéro
                $statements[] = "$key=:$key";
            }
        }
        $values['id'] = $data[$primary];
        $sql = "UPDATE {$table_name} SET " . implode(",", $statements) . " WHERE {$primary}=:{$primary}";
        var_dump($sql);
        try {
            $req_prep = self::$pdo->prepare($sql);
            $req_prep->execute($data);
            return true;
        } catch (PDOException $e) {
            //if Conf::debug is true, then show the message
            if (Conf::getDebug()) {
                echo $e->getMessage();
            }
            return false;
        }
    }

    /**
     * Deletes a object of a certain type by his id
     *  
     * @param  array $id The object's id
     * @return boolean
     */
    public static function delete($id) {
        $table_name = static::$object;
        $primary = static::$primary;
        $sql = "DELETE FROM {$table_name}  WHERE {$primary}=:id";
        try {
            $req_prep = self::$pdo->prepare($sql);
            $req_prep->execute(array(
                'id' => $id
            ));
            return true;
        } catch (PDOException $e) {
            //if Conf::debug is true, then show the message
            if (Conf::getDebug()) {
                echo $e->getMessage();
            }
            //else, just pretend nothing happened
            else {
                echo 'De quoi un crash serveur ? j\'ai rien vu moi';
            }
            return false;
        }
    }

}

//Initating the PDO object
Model::Init();

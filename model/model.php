<?php

class Model {

    private static $pdo;

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

        public static function save($data) {

        $table_name = ucfirst(static::$object);
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
            }
            else {
                echo 'De quoi un crash serveur ? j\'ai rien vu moi';
            }
            die();
        }
    }
    
     public static function update($data) {
        $table_name = ucfirst(static::$object);
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
        }
    }

    //delete an $object
    public static function delete($id) {
        $table_name = ucfirst(static::$object);
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
            die();
        }
    }
    
}

Model::Init();

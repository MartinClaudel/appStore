<?php

class Model{
    
    private static $pdo;
    
    public static function Init(){
        try{
            self::$pdo = new PDO("mysql:host=".Conf::get("host").";dbname=".Conf::get("dbname"),
                    Conf::get("login"),
                    Conf::get("psswd"), 
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            if(Conf::getDebug()) echo $e;
            echo "Database connection error";
        }   
    }
    
    
    public static function selectAll(){
        $sql = "SELECT * FROM ".static::$object;
        try {
            $rep=self::$pdo->query($sql);
            $rep->setFetchMode(PDO::FETCH_CLASS, ucfirst(static::$object));  
            return $rep->fetchAll();
        } catch (PDOException $e) {
            if(Conf::getDebug()) echo $e;
        }
    }
    
    public static function select($id){
        $sql = "SELECT * FROM ".static::$object." WHERE ".static::$primary."=:id;" ;
        try {
            $req_prep=self::$pdo->prepare($sql);
            $req_prep->execute(array(
                'id'=>$id
            ));
            $req_prep->setFetchMode(PDO::FETCH_CLASS, ucfirst(static::$object));  
            return $req_prep->fetch();
        } catch (PDOException $e) {
            if(Conf::getDebug()) echo $e;
        }
    }
    
}

Model::Init();
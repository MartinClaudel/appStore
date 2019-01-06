<?php

class Category extends Model{
    
    public static $object="category";
    public static $primary="ID";
    
    private $ID;
    private $name;
    private $OS;
    
    public function __construct($data=NULL) {
        if(!is_null($data)){
            $this->ID=$data["ID"];
            $this->name=$data["name"];
            $this->OS=$data["OS"];
        }
    }
    
    public function get($attrib){
        return $this->$attrib;
    }
    
}
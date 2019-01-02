<?php

class App extends Model{
    
    public static $object='app';
    public static $primary='ID';
    
    private $ID;
    private $pckg;
    private $OS;
    private $ver;
    private $name;
    private $description;
    private $image_link;
    
    public function __construct($data=NULL) {
        if(!is_null($data)){
            $this->ID=$data["ID"];
            $this->pckg=$data["pckg"];
            $this->OS=$data["OS"];
            $this->ver=$data["ver"];
            $this->name=$data["name"];
            $this->desccription=$data["description"];
            $this->image_link=$data['image_link'];
        }
    }
    
    public function get($key){
        return $this->$key;
    }
    
    
}
<?php

class Category extends Model {

    public static $object = "category";
    public static $primary = "ID";
    private $ID;
    private $name;
    private $OS;

    /**
     * Creates an Category object
     *  
     * @param  array $data The key array containing the object's data
     */
    public function __construct($data = NULL) {
        if (!is_null($data)) {
            $this->ID = $data["ID"];
            $this->name = $data["name"];
            $this->OS = $data["OS"];
        }
    }

    /**
     * Generic getter
     *  
     * @param  string $key The attribute to get the value from
     * @return value
     */
    public function get($attrib) {
        return $this->$attrib;
    }

}

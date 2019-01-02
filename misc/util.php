<?php



/**
 * Collection of utility functions
 */
class Util{
    
    
    /**
     * Returns a valid path made from an array containing directories and file names
     *  
     * @param  array $arr The relative path to root folder broken down
     * @return string
     */
    public static function build_path($arr){
        $DS=DIRECTORY_SEPARATOR;
        $path=__DIR__.$DS.'..';
        return $path.$DS. join($DS, $arr);
    }
    
}

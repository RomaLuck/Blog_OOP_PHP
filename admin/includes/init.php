<?php

function classautoloader($class){
    $class = strtolower($class);
    $the_path = "includes/{$class}.php";

    if(file_exists($the_path)){
        require_once($the_path);
    }else{
        die("This file name {$class}.php was not found");
    }


}
spl_autoload_register("classautoloader");

function redirect($location){
    header("Location: {$location}");
}
///home/roman/Projects/CMS_TEMPLATE  PHP
defined('DS')?null:define('DS',DIRECTORY_SEPARATOR);
define('SITE_ROOT',DS.'home'.DS.'roman'.DS.'Projects'.DS.'CMS_TEMPLATE_PHP');
defined('INCLUDES_PATH')?null:define('INCLUDES_PATH',SITE_ROOT.DS.'admin'.DS.'includes');

require_once (INCLUDES_PATH.DS."user_db.php");
require_once (INCLUDES_PATH.DS."config.php");
require_once (INCLUDES_PATH.DS."database.php");
require_once (INCLUDES_PATH.DS."db_object.php");
require_once (INCLUDES_PATH.DS."photo_db.php");
require_once (INCLUDES_PATH.DS."session.php");
require_once (INCLUDES_PATH.DS."comment.php");
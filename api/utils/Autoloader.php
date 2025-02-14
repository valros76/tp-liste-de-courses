<?php
class Autoloader{

  public static function register(){
    spl_autoload_register(function ($class){
      $configFile = file_get_contents("config/config.json");
      $config = json_decode($configFile);
      $folder = $config->autoloadFolder;
      $class = ucfirst($class);
      if(file_exists("{$folder}/{$class}.php")){
        require_once "{$folder}/{$class}.php";
      }
    });
  }

}
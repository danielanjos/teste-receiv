<?php

function autoloader ($class){
  $namespace = "Receiv" . DIRECTORY_SEPARATOR;
  $class = __DIR__ . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . str_replace($namespace, "", $class) . ".php";

  if(!file_exists($class)){
    throw new Exception("Class " . $class . " not found.", 1);
  }

  require_once($class);
}

spl_autoload_register("autoloader");
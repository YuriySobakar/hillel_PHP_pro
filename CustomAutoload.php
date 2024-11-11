<?php

function customAutoLoader($class) {
  $parts = explode('\\', $class);
  $className = array_pop($parts);
  $classPath = __DIR__ . '/' . str_replace('\\', '/', $class) .'.php';
  
  if (file_exists($classPath)) {
      require_once $classPath;
  } else {
    throw new Exception("File with class doesn't exist");
  }
}

spl_autoload_register('customAutoLoader');
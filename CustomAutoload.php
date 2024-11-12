<?php

function customAutoLoader($class) {
  $parts = explode('\\', $class);
  $className = array_pop($parts);
  $classPath = __DIR__ . '/' . str_replace('\\', '/', $class) .'.php';
  
  if (!file_exists($classPath)) {
    throw new Exception("File with class doesn't exist");
  }

  require_once $classPath;
}

spl_autoload_register('customAutoLoader');
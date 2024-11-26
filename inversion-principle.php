<?php

interface StorageProvider {
  public function getData();
}

class MySQL implements StorageProvider {
  public function getData () {
    return "some data";
  }
}

class Controller {
  private $adapter;
  
  public function __construct(StorageProvider $mysql) {
    $this->adapter = $mysql; 
  }

  function getData(): string {
    return $this->adapter->getData(); 
  }
}
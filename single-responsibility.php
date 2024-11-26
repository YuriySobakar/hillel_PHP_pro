<?php

class Product {
  private string $name;
  private int $value;

  public function getName(): string {
    return $this->$name;
  }

  public function setName(string $name): void {
    $this->name = $name;
  }
  public function getValue(): string {
    return $this->value;
  }

  public function setValue(int $value): void {
    $this->value = $value;
  }

  public function __construct(string $name, int $value = 0) {
    $this->name = $name;
    $this->value = $value;
  }
}

class ProductOperations {
  public function save(Product $obj): void {
    // some saving code logic
  }

  public function update(Product $obj): void {
    // some updating code logic
  }

  public function delete(Product $obj) {
    // some deleting code logic 
  }
}

class ProductOutPrint {
  public function show(Product $obj): string {
    return (string) $obj;
  }

  public function print(Product $obj): void {
    echo $this->show($obj);
  }
}
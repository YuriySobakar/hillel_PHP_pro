<?php

namespace Classes\User;

use Classes\CustomException\BadMethodRequest;

class User 
{
  private string $name;
  private string $age;
  private string $email;

  private function setName(string $name): void {
    $this->name = $name;
  }

  private function setAge(int $age): void {
    $this->age = $age;
  }

  private function getName(): string {
    return $this->name;
  }

  private function getAge(): int {
    return $this->age;
  }

  public function getAll() {
    return get_object_vars($this);
  }

  public function __call($method, $arguments) {

    if (!method_exists($this, $method)) {
      throw new BadMethodRequest();
    }

    return $this->$method(...$arguments);
  }
}
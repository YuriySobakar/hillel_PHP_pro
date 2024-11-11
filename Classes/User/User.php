<?php

namespace Classes\User;

class User
{
  private int $id;
  public string $name;
  public string $surname;

  function __construct (
    int $id,
    string $name,
    string $surname,
  ) {
    $this->id = $id;
    $this->name = $name;
    $this->surname = $surname;
  }
}
<?php

namespace Classes\CustomException;

class BadMethodRequest extends \Exception {

  public function showErrorMessage (): void {
    echo "This class doesn't have such method! Try another one! :)";
  }
}
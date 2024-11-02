<?php

class ValueObject {
  private const ERROR_INVALID_RED = "Red value is not valid";
  private const ERROR_INVALID_GREEN = "Green value is not valid";
  private const ERROR_INVALID_BLUE = "Blue value is not valid";
  private const MAX_COLOR_VALUE = 255;
  private const MIN_COLOR_VALUE = 0;

  private int $red;
  private int $green;
  private int $blue;

  private function validateColor (int $color): bool {
    return $color <= self::MAX_COLOR_VALUE && $color >= self::MIN_COLOR_VALUE;
  }

  private function mixColor (...$color_values) {
    return array_sum($color_values) / count($color_values);
  }

  public function setREd (int $red): void {
    if ($this->validateColor($red)) {
      $this->red = $red;
    } else {
      throw new Exception (self::ERROR_INVALID_RED);
    }
  }

  public function setGreen (int $green): void {
    if ($this->validateColor($green)) {
      $this->green = $green;
    } else {
      throw new Exception (self::ERROR_INVALID_GREEN);
    }
  }

  public function setBlue (int $blue): void {
    if ($this->validateColor($blue)) {
      $this->blue = $blue;
    } else {
      throw new Exception (self::ERROR_INVALID_BLUE);
    }
  }

  public function getRed (): int {
    return $this->red;
  }

  public function getGreen (): int {
    return $this->green;
  }

  public function getBlue (): int {
    return $this->blue;
  }

  public function equals (ValueObject $other): bool {
    return get_object_vars($this) === get_object_vars($other);
  }

  public static function random () {
    return new ValueObject(random_int(0,255), random_int(0,255), random_int(0,255));
  }

  public function mix (ValueObject $other) {
    return new ValueObject(
      $this->mixColor($this->red, $other->red),
      $this->mixColor($this->green, $other->green),
      $this->mixColor($this->blue, $other->blue),
    );
  }

  public function __construct (
    int $red = self::MIN_COLOR_VALUE,
    int $green = self::MIN_COLOR_VALUE,
    int $blue = self::MIN_COLOR_VALUE
    ) {
    $this->setREd($red);
    $this->setGreen($green);
    $this->setBlue($blue);
  }
}
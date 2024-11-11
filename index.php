<?php

trait trait1 {
  function test () {
    return 1;
  }
}

trait trait2 {
  function test () {
    return 2;
  }
}

trait trait3 {
  function test () {
    return 3;
  }
}

class Test {
  use trait1, trait2, trait3 {
    trait1::test insteadOf trait2, trait3;
    trait2::test as two;
    trait3::test as three;
  }

  public function getSum () {
    return $this->test() + $this->two() + $this->three();
  }
}

$test = new Test();
var_dump($test->getSum());
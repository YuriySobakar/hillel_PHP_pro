<?php

interface Flying {
  public function fly();
}

interface Eating {
  public function eat();
}

class Swallow implements Eating, Flying {
  public function eat(): void {
    //  eating logic
  }

  public function fly() {
    //  flying logic
  }
}

class Ostrich implements Eating{
  public function eat() {
    //  eating logic
  }
} 
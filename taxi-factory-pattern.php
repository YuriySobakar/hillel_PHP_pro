<?php

enum DeliveryType {
  case Economic;
  case Standard;
  case Premium;
}

enum CarModelType {
  case EcoClass;
  case BusinessClass;
  case PremiumClass;
}

interface Taxi {
  public function showCarModel(): void;
  public function showPrice(): void;
}

class Car implements Taxi {
  private CarModelType $modelType;
  private DeliveryType $delivery;

  public function __construct (
    CarModelType $modelType,
    DeliveryType $delivery
  ) {
    $this->modelType = $modelType;
    $this->delivery = $delivery;
  }

  public function showCarModel(): void {
    echo "Your car model is ({$this->modelType->name}) level <br>";
  }

  public function showPrice(): void {
    echo "Your price for ({$this->delivery->name}) type ride";
  }
}

abstract class TaxiFactory {
  abstract public function createTaxiCar(): Taxi;
}

class EcoTaxiFactory extends TaxiFactory {
  public function createTaxiCar(): Taxi {
    return new Car(CarModelType::EcoClass, DeliveryType::Economic);
  }
}
class StandardTaxiFactory extends TaxiFactory {
  public function createTaxiCar(): Taxi {
    return new Car(CarModelType::BusinessClass, DeliveryType::Standard);
  }
}
class PremiumTaxiFactory extends TaxiFactory {
  public function createTaxiCar(): Taxi {
    return new Car(CarModelType::PremiumClass, DeliveryType::Premium);
  }
}

function makeTaxiOrder(TaxiFactory $factory) {
  $taxiCar = $factory->createTaxiCar();
  $taxiCar->showCarModel();
  $taxiCar->showPrice();
}
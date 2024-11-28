<?php

class Contact {
  public ?string $name = null;
  public ?string $surname = null;
  public ?string $address = null;
  public ?string $phone = null;
  public ?string $email = null;

  public function __construct(
    ?string $name = null, 
    ?string $surname = null, 
    ?string $address = null, 
    ?string $phone = null, 
    ?string $email = null
    ) {
      $this->name = $name;
      $this->surname = $surname;
      $this->address = $address;
      $this->phone = $phone;
      $this->email = $email;
  }
}

interface ContactBuilderInterface {
  public function name(string $name): self;
  public function phone(string $phone): self;
  public function surname(string $surname): self;
  public function address(string $address): self;
  public function email(string $email): self;
  public function build(): Contact;
}

class ContactBuilder implements ContactBuilderInterface {
  private Contact $contact;
  
  public function __construct() {
    $this->contact = new Contact();
  }

  public function name(string $name): self {
    $this->contact->name = $name;
    return $this;
  }

  public function phone(string $phone): self {
    $this->contact->phone = $phone;
    return $this;
  }

  public function surname(string $surname): self {
    $this->contact->surname = $surname;
    return $this;
  }

  public function address(string $address): self {
    $this->contact->address = $address;
    return $this;
  }

  public function email(string $email): self {
    $this->contact->email= $email;
    return $this;
  }

  public function build(): Contact {
    return $this->contact;
  }
}

$builder = new ContactBuilder();

$contact = $builder
  ->name('Yuriy')
  ->surname('Surname')
  ->email('some@mail.com')
  ->address('some address')
  ->phone('+3 8 04545344345')
  ->build();
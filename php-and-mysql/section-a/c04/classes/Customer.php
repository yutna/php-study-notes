<?php

class Customer
{
  public string $forename;
  public string $surname;
  public string $email;
  public string $password;
  public array $accounts;

  public function __construct(string $forename, string $surname, string $email, string $password, array $accounts)
  {
    $this->forename = $forename;
    $this->surname = $surname;
    $this->email = $email;
    $this->password = $password;
    $this->accounts = $accounts;
  }

  public function get_full_name(): string
  {
    return $this->forename . ' ' . $this->surname;
  }
}

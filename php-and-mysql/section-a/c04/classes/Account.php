<?php

class Account
{
  public int $number;
  public string $type;
  protected float $balance;

  public function __construct(int $number, string $type, float $balance = 0.0)
  {
    $this->number = $number;
    $this->type = $type;
    $this->balance = $balance;
  }

  public function deposit(float $amount): float
  {
    $this->balance += $amount;
    return $this->balance;
  }

  public function withdraw(float $amount): float
  {
    $this->balance -= $amount;
    return $this->balance;
  }

  public function get_balance(): float
  {
    return $this->balance;
  }
}

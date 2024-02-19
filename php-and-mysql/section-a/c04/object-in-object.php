<?php
  declare(strict_types = 1);

  class Account
  {
    public AccountNumber $number;
    public string $type;
    protected float $balance;

    public function __construct(AccountNumber $number, string $type, float $balance = 0.0)
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

  class AccountNumber
  {
    public int $account_number;
    public int $routing_number;

    public function __construct(int $account_number, int $routing_number)
    {
      $this->account_number = $account_number;
      $this->routing_number = $routing_number;
    }
  }

  $account_number = new AccountNumber(123456789, 987654321);
  $account = new Account($account_number, 'Savings', 10.00);
?>

<?php include 'includes/header.php' ?>

<h2><?= $account->type ?> Account</h2>
<p>
  Account: <?= $account->number->account_number ?>
  <br>
  Routing: <?= $account->number->routing_number ?>
</p>

<?php include 'includes/footer.php' ?>

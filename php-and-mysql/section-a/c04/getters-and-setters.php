<?php

declare(strict_types=1);

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

    public function getBalance(): float
    {
        return $this->balance;
    }
}

$account = new Account(20148896, 'Savings', 80.00);
?>

<?php include 'includes/header.php' ?>

<h2><?= $account->type ?> Account</h2>
<p>Previous balance: &dollar;<?= $account->getBalance() ?></p>
<p>New balance: &dollar;<?= $account->withdraw(50.00) ?></p>
<p>New balance: &dollar;<?= $account->deposit(35.00) ?></p>

<?php include 'includes/footer.php' ?>

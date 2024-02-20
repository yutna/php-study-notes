<?php

declare(strict_types=1);

class Account
{
    public int $number;
    public string $type;
    public float $balance;

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
}

$checking = new Account(43161176, 'Checking', 32.00);
$savings = new Account(20148896, 'Savings', 756.00);
$highInterest = new Account(12345677, 'High-Interest', 1000.00);
?>

<?php include 'includes/header.php' ?>

<h2>Account Balances</h2>
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th><?= $checking->type ?></th>
            <th><?= $savings->type ?></th>
            <th><?= $highInterest->type ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>23 June</td>
            <td>&dollar;<?= $checking->balance ?></td>
            <td>&dollar;<?= $savings->balance ?></td>
            <td>&dollar;<?= $highInterest->balance ?></td>
        </tr>
        <tr>
            <td>24 June</td>
            <td>&dollar;<?= $checking->deposit(12.00) ?></td>
            <td>&dollar;<?= $savings->withdraw(100.00) ?></td>
            <td>&dollar;<?= $highInterest->deposit(1000.00) ?></td>
        </tr>
        <tr>
            <td>25 June</td>
            <td>&dollar;<?= $checking->withdraw(5.00) ?></td>
            <td>&dollar;<?= $savings->deposit(300.00) ?></td>
            <td>&dollar;<?= $highInterest->deposit(1000.00) ?></td>
        </tr>
    </tbody>
</table>

<?php include 'includes/footer.php' ?>

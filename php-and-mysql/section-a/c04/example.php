<?php
  declare(strict_types = 1);

  include 'classes/Account.php';
  include 'classes/Customer.php';

  $accounts = [
    new Account(20489446, 'Checking', -20),
    new Account(20148896, 'Savings', 380),
  ];

  $customer = new Customer('Ivy', 'Stone', 'ivy@eg.link', 'secret', $accounts);
?>

<?php include 'includes/header.php' ?>

<h2>
  Name: <strong><?= $customer->get_full_name() ?></strong>
</h2>

<table>
  <thead>
    <tr>
      <th>Account Number</th>
      <th>Account Type</th>
      <th>Balance</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($customer->accounts as $account) { ?>
      <tr></tr>
        <td><?= $account->number ?></td>
        <td><?= $account->type ?></td>
        <?php if ($account->get_balance() >= 0) { ?>
          <td class="credit">
        <?php } else { ?>
          <td class="overdrawn">
        <?php } ?>
          &dollar; <?= $account->get_balance() ?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<?php include 'includes/footer.php' ?>

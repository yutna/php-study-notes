<?php

declare(strict_types=1);

$username = 'Ivy';
$user_array = [
    'name' => 'Ivy',
    'age' => 24,
    'active' => true,
];

class User
{
    public string $name;
    public int $age;
    public bool $active;

    public function __construct(string $name, int $age, bool $active)
    {
        $this->name = $name;
        $this->age = $age;
        $this->active = $active;
    }
}

$user_object = new User('Ivy', 24, true);
?>

<?php include 'includes/head.php' ?>

<pre>Scalar: <?php var_dump($username) ?></pre>
<pre>Array: <?php var_dump($user_array) ?></pre>
<pre>Object: <?php var_dump($user_object) ?></pre>

<?php include 'includes/footer.php' ?>

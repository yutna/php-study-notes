<?php
include 'includes/sessions.php';

if ($logged_in) {
    redirect_to_account_page();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    $is_valid_user_email = $user_email === $email;
    $is_valid_user_password = $user_password === $password;

    if ($is_valid_user_email && $is_valid_user_password) {
        login();
        redirect_to_account_page();
    }
}
?>

<?php include 'includes/header-member.php'; ?>

<h1>Login</h1>
<form action="login.php" method="POST">
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
    </div>
    <input type="submit" value="Log In">
</form>

<?php include 'includes/footer.php'; ?>

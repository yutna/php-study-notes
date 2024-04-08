<?php

declare(strict_types=1);

use PhpBook\Validate\Validate;

$errors = [];
$token = $_GET['token'] ?? '';

if (!$token) {
    redirect('login/');
}

$id = $cms->getToken()->getMemberId($token, 'password_reset');

if (!$id) {
    redirect('login/', ['warning' => 'Link expired, try again.']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    $errors['password'] = Validate::isPassword($password) ? '' : 'Passwords must be at least 8 characters and have:<br />
                                                                  A lowercase letter<br />An uppercase letter<br />A number
                                                                  <br />And a special character';
    $errors['confirm'] = ($password === $confirm) ? '' : 'Password do not match';
    $invalid = implode($errors);

    if ($invalid) {
        $errors['message'] = 'Please enter a valid password.';
    } else {
        $cms->getMember()->passwordUpdate($id, $password);
        $member = $cms->getMember()->get($id);
        $subject = 'Password Updated';
        $body = 'Your password was updated on ' . date('Y-m-d H:i:s') . ' - if your did not reset the password, email ' . $email_config['admin_email'];
        $email = new \PhpBook\Email\Email($email_config);
        $email->sendEmail($email_config['admin_email'], $member['email'], $subject, $body);
        redirect('login/', ['success' => 'Password updated']);
    }
}

$data['navigation'] = $cms->getCategory()->getAll();
$data['errors'] = $errors;
$data['token'] = $token;

echo $twig->render('password-reset.html.twig', $data);

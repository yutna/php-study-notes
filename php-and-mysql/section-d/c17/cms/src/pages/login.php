<?php

declare(strict_types=1);

use PhpBook\Validate\Validate;

$email = '';
$errors = [];

if ($session->id > 0) {
    redirect('member/' . $session->id);
}

$success = $_GET['success'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors['email'] = Validate::isEmail($email) ? '' : 'Please enter a valid email address';
    $errors['password'] = Validate::isPassword($password) ? '' : 'Passwords must be at least 8 characters and have:<br>
                                                                  A lowercase letter<br>An uppercase letter<br>A number<br>
                                                                  And a special character';

    $invalid = implode($errors);

    if ($invalid) {
        $errors['message'] = 'Please try again';
    } else {
        $member = $cms->getMember()->login($email, $password);

        if ($member && $member['role'] === 'suspended') {
            $errors['message'] = 'Account suspended';
        } elseif ($member) {
            $cms->getSession()->create($member);
            redirect('member/' . $member['id']);
        } else {
            $errors['message'] = 'Please try again.';
        }
    }
}

$data['navigation'] = $cms->getCategory()->getAll();
$data['success'] = $success;
$data['email'] = $email;
$data['errors'] = $errors;

echo $twig->render('login.html.twig', $data);

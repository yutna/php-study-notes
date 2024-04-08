<?php

declare(strict_types=1);

use PhpBook\Email\Email;
use PhpBook\Validate\Validate;

$from = '';
$message = '';
$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $from = $_POST['email'];
    $message = $_POST['message'];

    $errors['email'] = Validate::isEmail($from) ? '' : 'Email not valid';
    $errors['message'] = Validate::isText($message, 1, 1000) ? '' : 'Please enter a message up to 1,000 characters';

    $invalid = implode($errors);

    if ($invalid) {
        $errors['warning'] = 'Please check from errors';
    } else {
        $subject = 'Contact from message from ' . $from;
        $email = new Email($email_config);
        $email->sendEmail($email_config['admin_email'], $email_config['admin_email'], $subject, $message);
        $success = 'Your message has been sent';
    }
}

$data['navigation'] = $cms->getCategory()->getAll();
$data['from'] = $from;
$data['message'] = $message;
$data['errors'] = $errors;
$data['success'] = $success;

echo $twig->render('contact.html.twig', $data);

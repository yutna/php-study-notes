<?php

declare(strict_types=1);

use PhpBook\Validate\Validate;

require '../src/bootstrap.php';

$id = $cms->getSession()->id;

if ($id === 0) {
    redirect('login.php');
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $member = $cms->getMember()->get($cms->getSession()->id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $member['id'] = $cms->getSession()->id;
    $member['forename'] = $_POST['forename'];
    $member['surname'] = $_POST['surname'];
    $member['email'] = $_POST['email'];
    $member['role'] = $cms->getSession()->role;

    $errors['forename'] = Validate::isText($member['forename'], 1, 254) ? '' : 'Forename should be between 1 and 254 characters';
    $errors['surname'] = Validate::isText($member['surname'], 1, 254) ? '' : 'Surname should be between 1 and 254 characters';
    $errors['email'] = Validate::isEmail($member['email']) ? '' : 'Please enter a valid email address';

    $invalid = implode($errors);

    if ($invalid) {
        $errors['message'] = 'Please correct form errors';
    } else {
        $result = $cms->getMember()->update($member);

        if ($result === false) {
            $errors['message'] = 'Email already in use';
        } else {
            $cms->getSession()->update($member);
            redirect('member.php', ['id' => $member['id'], 'success' => 'Profile saved']);
        }
    }
}

$data['navigation'] = $cms->getCategory()->getAll();
$data['member'] = $member;
$data['errors'] = $errors;

echo $twig->render('member-edit-profile.html.twig', $data);

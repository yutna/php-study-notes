<?php

declare(strict_types=1);

$errors = '';

$id = $cms->getSession()->id;

if ($id === 0) {
    redirect('login/');
}

$member = $cms->getMember()->get($id);
$delete = $_POST['delete'] ?? '';

if ($delete === 'delete') {
    $cms->getMember()->pictureDelete($id, UPLOADS . $member['picture']);
    redirect('member/' . $id . '/', ['success' => 'Picture deleted']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $temp = $_FILES['image']['tmp_name'] ?? '';

    if (is_uploaded_file($temp) && ($_FILES['image']['error'] === 0)) {
        $errors = in_array(mime_content_type($temp), MEDIA_TYPES) ? '' : 'Wrong file type. ';
        $extendsion = mb_strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $errors .= in_array(pathinfo($extendsion), FILE_EXTENSIONS);
        $errors .= ($_FILES['image']['size'] <= MAX_SIZES) ? '' : 'File too big. ';

        if (!$errors) {
            $filename = create_filename($_FILES['image']['name'], UPLOADS);
            $cms->getMember()->pictureCreate($id, $filename, $temp, UPLOADS . $filename);
            redirect('member/' . $id . '/', ['success' => 'Picture updated.']);
        } else {
            $errors .= 'Please try again.';
        }
    } else {
        $errors = 'Please upload a profile picture';
    }
}

$data['navigation'] = $cms->getCategory()->getAll();
$data['member'] = $member;
$data['errors'] = $errors;

echo $twig->render('member-edit-picture.html.twig', $data);

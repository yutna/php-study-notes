<?php

declare(strict_types=1);

use PhpBook\Validate\Validate;

require '../../src/bootstrap.php';

is_admin($session->role);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$saved = false;

$category = [
    'id' => $id,
    'name' => '',
    'description' => '',
    'navigation' => false,
];

$errors = [
    'warning' => '',
    'name' => '',
    'description' => '',
];

// If there was an id, page is editing the category, so get current category
if ($id) {
    $category = $cms->getCategory()->get($id);

    if (!$category) {
        redirect('categories.php', ['failure' => 'Category not found']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category['name'] = $_POST['name'];
    $category['description'] = $_POST['description'];
    $category['navigation'] = isset($_POST['navigation']) && ($_POST['navigation'] == 1) ? 1 : 0;

    $errors['name'] = Validate::isText($category['name'], 1, 24) ? '' : 'Name should be 1-24 characters.';
    $errors['description'] = Validate::isText($category['description'], 1, 254) ? '' : 'Description should be 1-254 characters.';

    $invalid = implode($errors);

    if ($invalid) {
        $errors['warning'] = 'Please correct errors';
    } else {
        $arguments = $category;

        if ($id) {
            $saved = $cms->getCategory()->update($arguments);
        } else {
            unset($arguments['id']);
            $saved = $cms->getCategory()->create($arguments);
        }

        if ($saved) {
            redirect('categories.php', ['success' => 'Category saved']);
        } else {
            $errors['warning'] = 'Category name already in use';
        }
    }
}

$data['id'] = $id;
$data['errors'] = $errors;
$data['category'] = $category;

echo $twig->render('admin/category.html.twig', $data);

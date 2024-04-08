<?php

declare(strict_types=1);

use PhpBook\Validate\Validate;

is_admin($session->role);

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
        redirect('admin/categories/', ['failure' => 'Category not found']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category['name'] = $_POST['name'];
    $category['description'] = $_POST['description'];
    $category['navigation'] = isset($_POST['navigation']) && ($_POST['navigation'] == 1) ? 1 : 0;
    $category['seo_name'] = create_seo_name($category['name']);

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
            redirect('admin/categories/', ['success' => 'Category saved']);
        } else {
            $errors['warning'] = 'Category name already in use';
        }
    }
}

$data['id'] = $id;
$data['errors'] = $errors;
$data['category'] = $category;

echo $twig->render('admin/category.html.twig', $data);

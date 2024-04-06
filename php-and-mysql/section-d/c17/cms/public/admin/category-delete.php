<?php

declare(strict_types=1);

require '../../src/bootstrap.php';

is_admin($session->role);

$deleted = null;
$category = '';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    redirect('categories.php', ['failure' => 'Category not found']);
}

$category = $cms->getCategory()->get($id);

if (!$category) {
    redirect('categories.php', ['failure' => 'Category not found']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deleted = $cms->getCategory()->delete($id);

    if ($deleted) {
        redirect('categories.php', ['success' => 'Category deleted']);
    } else {
        redirect('categories.php', ['failure' => 'Category contains articles that must be moved or deleted before you can delete the category']);
    }
}

$data['id'] = $id;
$data['category'] = $category;

echo $twig->render('admin/category-delete.html.twig', $data);

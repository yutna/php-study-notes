<?php

declare(strict_types=1);

is_admin($session->role);

$deleted = null;
$category = '';

if (!$id) {
    redirect('admin/categories/', ['failure' => 'Category not found']);
}

$category = $cms->getCategory()->get($id);

if (!$category) {
    redirect('admin/categories/', ['failure' => 'Category not found']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deleted = $cms->getCategory()->delete($id);

    if ($deleted) {
        redirect('admin/categories/', ['success' => 'Category deleted']);
    } else {
        redirect('admin/categories/', ['failure' => 'Category contains articles that must be moved or deleted before you can delete the category']);
    }
}

$data['id'] = $id;
$data['category'] = $category;

echo $twig->render('admin/category-delete.html.twig', $data);

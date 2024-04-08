<?php

declare(strict_types=1);

is_admin($cms->getSession()->role);

if (!$id) {
    redirect('admin/members/', ['failure' => 'Member not found']);
}

$member = $cms->getMember()->get($id);

if (!$member) {
    redirect('admin/members/', ['failure' => 'Member not found']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'] ?? '';

    if (in_array($role, ['member', 'admin', 'suspended'])) {
        $member['role'] = $role;
        $cms->getMember()->update($member);
        redirect('admin/members/', ['success' => 'Role updated']);
    }
}

$data['navigation'] = $cms->getCategory()->getAll();
$data['member'] = $member;

echo $twig->render('admin/edit-role.html.twig', $data);

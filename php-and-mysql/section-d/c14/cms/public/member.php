<?php

declare(strict_types=1);

require '../src/bootstrap.php';
require 'includes/database-connection.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    include 'page-not-found.php';
}

$member_query = "SELECT forename, surname, joined, picture FROM member WHERE id = :id;";
$member = pdo($pdo, $member_query, ['id' => $id])->fetch();

if (!$member) {
    include 'page-not-found.php';
}

$aritcle_query = "SELECT a.id, a.title, a.summary, a.category_id, a.member_id,
                         c.name AS category,
                         CONCAT(m.forename, ' ', m.surname) AS author,
                         i.file AS image_file,
                         i.alt AS image_alt
                  FROM article AS a
                  JOIN category AS c ON a.category_id = c.id
                  JOIN member AS m ON a.member_id = m.id
                  LEFT JOIN image AS i ON a.image_id = i.id
                  WHERE a.member_id = :id AND a.published = 1
                  ORDER BY a.id DESC";
$articles = pdo($pdo, $aritcle_query, ['id' => $id])->fetchAll();

$navigation_query = "SELECT id, name FROM category WHERE navigation = 1;";
$navigation = pdo($pdo, $navigation_query)->fetchAll();

$section = '';
$title = $member['forename'] . ' ' . $member['surname'];
$description = $title . ' on Creative Folk';
?>

<?php include 'includes/header.php'; ?>

<main class="container" id="content">
    <section class="header">
        <h1><?= html_escape($member['forename'] . ' ' . $member['surname']) ?></h1>
        <p class="member">
            <b>Member since:</b>
            <?= format_date($member['joined']) ?>
        </p>
        <img alt="<?= html_escape($member['forename']) ?>" class="profile" src="uploads/<?= html_escape($member['picture'] ?? 'member.png') ?>">
        <br>
    </section>
    <section class="grid">
        <?php foreach ($articles as $article) { ?>
            <article class="summary">
                <a href="article.php?id=<?= $article['id'] ?>">
                    <img alt="<? html_escape($article['image_alt']) ?>" src="uploads/<?= html_escape($article['image_file'] ?? 'blank.png') ?>">
                    <h2><?= html_escape($article['title']) ?></h2>
                    <p><?= html_escape($article['summary']) ?></p>
                </a>
                <p class="credit">
                    Posted in
                    <a href="category.php?id=<?= $article['category_id'] ?>">
                        <?= html_escape($article['category']) ?>
                    </a>
                    by
                    <a href="member.php?id=<?= $article['member_id'] ?>">
                        <?= html_escape($article['author']) ?>
                    </a>
                </p>
            </article>
        <?php } ?>
    </section>
</main>

<?php include 'includes/footer.php'; ?>

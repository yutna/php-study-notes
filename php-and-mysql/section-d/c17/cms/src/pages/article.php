<?php

declare(strict_types=1);

use PhpBook\Validate\Validate;

if (!$id) {
    include APP_ROOT . '/src/pages/page-not-found.php';
}

$article = $cms->getArticle()->get($id);

if (!$article) {
    include APP_ROOT . '/src/pages/page-not-found.php';
}

if (mb_strtolower($parts[3]) != mb_strtolower($article['seo_title'])) {
    redirect('article/' . $id . '/' . $article['seo_title'], [], 301);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = $_POST['comment'];
    $purifier = new \HTMLPurifier();
    $purifier->config->set('HTML.Allowed', 'br,b,i,a[href]');
    $comment = $purifier->purify($comment);

    $error = Validate::isText($comment, 1, 2000) ? '' : 'Your comment must be between 1 and 2000 characters.
                                                         It can contain <b>, <i>, <a> and <br> tags.';

    if ($error === '') {
        $arguments = [$comment, $article['id'], $cms->getSession()->id];

        $cms->getComment()->create($arguments);
        redirect('article/' . $article['id'] . '/' . $article['seo_title']);
    }
}

$data['navigation'] = $cms->getCategory()->getAll();
$data['comments'] = $cms->getComment()->getAll($id);
$data['article'] = $article;
$data['section'] = $article['category_id'];
$data['title'] = $article['title'];
$data['description'] = $article['summary'];

if ($cms->getSession()->id > 0) {
    $data['liked'] = $cms->getLike()->get([$id, $cms->getSession()->id]);
    $data['error'] = $error ?? null;
}

echo $twig->render('article.html.twig', $data);

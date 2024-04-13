<?php
$chapters = glob(dirname(__FILE__) . '/*', GLOB_ONLYDIR);

function get_chapter_name($chapter)
{
    $chapter = basename($chapter);
    return match ($chapter) {
        'c01' => 'Chapter 1: Introduction PHP',
        'c02' => 'Chapter 2: Language Basics',
        'c03' => 'Chapter 3: Functions',
        'c04' => 'Chapter 4: Strings',
        'c05' => 'Chapter 5: Arrays',
        'c06' => 'Chapter 6: Objects',
        'c07' => 'Chapter 7: Dates and Times',
        'c08' => 'Chapter 8: Web Techniques',
        'c09' => 'Chapter 9: Databases',
        'c10' => 'Chapter 10: Graphics',
        'c11' => 'Chapter 11: PDF',
        'c12' => 'Chapter 12: XML',
        'c13' => 'Chapter 13: JSON',
        'c14' => 'Chapter 14: Security',
        'c15' => 'Chapter 15: Application Techniques',
        'c16' => 'Chapter 16: Web Services',
        'c17' => 'Chapter 17: Debugging PHP',
        'c18' => 'Chapter 18: PHP on Disparate Platforms',
    };
}

function list_all_files($path)
{
    $files = scandir($path);
    $files = array_diff($files, array('..', '.'));
    $files = array_filter($files, function ($file) {
        return mb_strpos($file, '.php');
    });

    return $files;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programming PHP: Creating Dynamic Web Pages</title>
    <style>
        body {
            color: white;
            background-color: black;
        }

        a:link {
            color: red;
        }

        a:visited {
            color: pink;
        }

        a:link:active,
        a:visited:active {
            color: salmon;
        }
    </style>
</head>

<body>
    <?php foreach ($chapters as $chapter) { ?>
        <section>
            <h1><?= get_chapter_name($chapter) ?></h1>
            <ul>
                <?php $files = list_all_files($chapter) ?>
                <?php foreach ($files as $file) { ?>
                    <li>
                        <a href="<?= basename($chapter) . '/' . $file ?>">
                            <?= $file ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </section>
    <?php } ?>
</body>

</html>

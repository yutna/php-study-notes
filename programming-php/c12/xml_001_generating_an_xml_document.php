<?php
header('Content-Type: text/xml');
echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>";
?>

<!DOCTYPE rss PUBLIC "-//Netscape Communications//DTD RSS 0.91//EN" "http://my.netscape.com/publish/formats/rss-0.91.dtd">
<rss version="0.91">
    <channel>
        <?php
        $items = [
            [
                'title' => 'Man Bites Dog',
                'link' => 'http://www.example.com/dog.php',
                'desc' => 'Ironic turnaround!'
            ],
            [
                'title' => 'Medical Breakthough',
                'link' => 'http://www.example.com/doc.php',
                'desc' => 'Doctors announced a cure for me.'
            ]
        ];

        foreach ($items as $item) {
            $tag = <<<TAG
            <item>
                <title>{$item['title']}</title>
                <link>{$item['link']}</link>
                <description>{$item['desc']}</description>
                <languages>en-us</languages>
            </item>
            TAG;

            echo $tag;
        }
        ?>
    </channel>
</rss>

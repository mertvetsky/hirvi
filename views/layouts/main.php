<?php
/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:42 PM
 */

/**
 * @var string $content
 * @var string $title
 * @var string[] $css
 * @var string[] $js
 */
?>
<head>
    <title><?= $title ?></title>
    <? foreach ($js as $js_path): ?>
        <script type="text/javascript" src="/js/<?= $js_path ?>"></script>
    <? endforeach ?>

    <? foreach ($css as $css_path): ?>
        <link href="/css/<?= $css_path ?>" rel="stylesheet" media="all"/>
    <? endforeach ?>

</head>
<body>
HEAD
<hr>
<?= $content ?>
<hr>
FOOT
</body>
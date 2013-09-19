<?php

switch ($action) {
    case 'assets':
        write_asset("/articles/{$code}/assets/$asset");
        break;

    case 'index':
        render('blog', 'index', array(
            'personalCard' => $content->personalCard,
            'articles'     => $content->articles
        ));
        break;

    case 'view':
        $article = $content->articles[$code];
        $article->contents = get_article_contents($code);

        render('blog', 'show', array(
            'personalCard' => $content->personalCard,
            'article' => $article
        ));
        break;
}




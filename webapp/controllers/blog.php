<?php

switch ($action) {
    case 'assets':
        write_asset("/blog/{$code}/assets/$asset");
        break;

    case 'index':
        render('blog', 'index', array(
            'personalCard' => $personalCard,
            'articles' => $articles
        ));
        break;

    case 'view':
        $article = $articles[$code];
        $article->contents = get_article_contents($code);

        render('blog', 'show', array(
            'personalCard' => $personalCard,
            'article' => $article
        ));
        break;
}




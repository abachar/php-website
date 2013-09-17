<?php
render('home', 'index', array(
    'personalCard' => $personalCard,
    'projects' => array_slice($projects, 0, 2),
    'articles' => array_slice($articles, 0, 3)
));
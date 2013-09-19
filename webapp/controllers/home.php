<?php

render('home', 'index', array(
    'personalCard' => $content->personalCard,
    'projects' => array_slice($content->projects, 0, 2),
    'articles' => array_slice($content->articles, 0, 3)
));
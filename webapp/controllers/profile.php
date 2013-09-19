<?php

render('profile', 'index', array(
    'experiences' => $content->experiences,
    'projects' => $content->projects,
    'competences' => $content->competences,
    'studies' => $content->studies,
    'languages' => $content->languages,
    'interests' => $content->interests,
    'personalCard' => $content->personalCard
));

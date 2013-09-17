<?php
render('profile', 'index', array(
    'experiences' => $experiences,
    'projects' => $projects,
    'competences' => $competences,
    'studies' => $studies,
    'languages' => $languages,
    'interests' => $interests,
    'personalCard' => $personalCard
));

<?php

switch ($action) {
    case 'assets':
        write_asset("/projects/{$asset}");
        break;

    case 'index':
        render('projects', 'index', array(
            'personalCard' => $personalCard,
            'projects' => $projects
        ));
        break;
}
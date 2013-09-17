<?php

// Errors display
ini_set('error_reporting', E_ALL | E_STRICT); // 0
ini_set("display_errors", 1); // 0

// Time zone
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

// Config directories
$ROOT_PATH   = realpath(dirname(__FILE__));
$WEBAPP_PATH = realpath("{$ROOT_PATH}/webapp");
$LIB_PATH    = realpath("{$WEBAPP_PATH}/libs");

/**
 * Requested page
 */
// $uri = isset($_SERVER['REQUEST_URI']) ? strtolower(trim($_SERVER['REQUEST_URI'], '/')) : 'home';
$uri = isset($_GET['uri']) ? strtolower(trim($_GET['uri'], '/')) : 'home';
if (in_array($uri, array('home', 'profile', 'blog', 'projects', 'contact'))) {
    $controller = $uri;
    $action     = 'index';
}
else if (strpos($uri, 'projects/assets/') === 0) {
    $controller = 'projects';
    $action     = 'assets';
    $asset      = substr($uri, 16);
}
else if (preg_match('/^blog\/(.*)\/assets\/(.*)$/i', $uri, $matches)) {
    $controller = 'blog';
    $action     = 'assets';
    $code       = $matches[1];
    $asset      = $matches[2];
}
else if (preg_match('/^blog\/(.*)$/i', $uri, $matches)) {
    $controller = 'blog';
    $action     = 'view';
    $code       = $matches[1];
}
else {
    header('Location : /');
    exit;
}

// All application functions
require_once("{$WEBAPP_PATH}/models/personal-card.php");
require_once("{$WEBAPP_PATH}/models/article.php");
require_once("{$WEBAPP_PATH}/models/project.php");
require_once("{$WEBAPP_PATH}/models/competence.php");
require_once("{$WEBAPP_PATH}/models/experience.php");
require_once("{$WEBAPP_PATH}/models/study.php");
require_once("{$WEBAPP_PATH}/models/language.php");
require_once("{$WEBAPP_PATH}/models/interest.php");
require_once("{$WEBAPP_PATH}/libs/utils.php");

// Call controller
require_once("{$WEBAPP_PATH}/controllers/{$controller}.php");
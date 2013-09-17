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
$uri = strtolower(trim($_SERVER['REQUEST_URI'], '/'));

/**
 * URLs config
 */
$routes = array(
    ''                      => array('controller' => 'home'    , 'action' => 'index'),
    'home'                  => array('controller' => 'home'    , 'action' => 'index'),
    'profile'               => array('controller' => 'profile' , 'action' => 'index'),
    'blog'                  => array('controller' => 'blog'    , 'action' => 'index'),
    'projects'              => array('controller' => 'projects', 'action' => 'index'),
    'contact'               => array('controller' => 'contact' , 'action' => 'index'),
    'projects/assets/(.*)'  => array('controller' => 'projects', 'action' => 'assets', 'asset' => '{1}'),
    'blog/(.*)/assets/(.*)' => array('controller' => 'blog'    , 'action' => 'assets', 'code'  => '{1}', 'asset' => '{2}'),
    'blog/(.*)'             => array('controller' => 'blog'    , 'action' => 'view'  , 'code'  => '{1}'),
);

/**
 * Parse request URI
 */
foreach ($routes as $regexp => $config) {
    if (preg_match("@^{$regexp}$@i", $uri, $matches)) {
        foreach ($config as $name => $value) {
            for ($i = 1; $i < count($matches); $i++) {
               $value = str_replace('{'.$i.'}', $matches[$i], $value);
            }
            $GLOBALS[$name] = $value;
        }
       break;
    }
}

/**
 * If no controller was found, redirect to home
 */
if (!isset($GLOBALS['controller'])) {
    header('Location : /');
    exit;
}

// Load content data
load_contents(simplexml_load_file("{$WEBAPP_PATH}/contents/contents.xml"));

// Call controller
require_once("{$WEBAPP_PATH}/controllers/{$controller}.php");

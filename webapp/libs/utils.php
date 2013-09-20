<?php

/**
 *
 */
function render($controller, $view, $vars = array())
{
    global $WEBAPP_PATH, $LIB_PATH;

    // Include smarty
    require_once("{$LIB_PATH}/smarty/Smarty.class.php");

    // Render
    $smarty = new Smarty();
    $smarty->template_dir = "{$WEBAPP_PATH}/views/layouts";

    foreach ($vars as $key => $var) {
        $smarty->assign($key, $var);
    }
    $smarty->assign('controller', $controller);
    $smarty->assign('view', $view);
    $smarty->assign('layout', "{$WEBAPP_PATH}/views/layouts/layout.tpl");

    $smarty->display("{$WEBAPP_PATH}/views/{$controller}/{$view}.tpl");
}

/**
 * @param $basedir
 * @param $path
 */
function write_asset($asset)
{
    global $WEBAPP_PATH;

    $filename = realpath("{$WEBAPP_PATH}/contents/assets/{$asset}");
    if (file_exists($filename)) {
        $types = array(
            'swf' => 'application/x-shockwave-flash',
            'gif' => 'image/gif',
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'zip' => 'application/zip'
        );

        $ext = substr(strrchr($filename, "."), 1);
        if ($types[$ext]) {
            header("Content-Type: {$types[$ext]}");
        } else {
            header('Content-Type: application/octet-stream');
        }
        header('Content-Length: ' . filesize($filename));
        die(file_get_contents($filename));
    }
}

/**
 * @param $code
 */
function get_article_contents($code)
{
    global $WEBAPP_PATH;

    return file_get_contents("{$WEBAPP_PATH}/contents/assets/articles/{$code}/article.md");
}

/**
 *
 */
function validate_not_empty($fieldName, &$errors, $msg)
{
    if (empty($_POST[$fieldName])) {
        $errors[$fieldName] = $msg;
        return '';
    }
    return $_POST[$fieldName];
}

/**
 *
 */
function validate_not_empty_email($fieldName, &$errors, $msg1, $msg2)
{
    $email = validateNotEmpty($fieldName, $errors, $msg1);
    if (($email !== '') && !preg_match("/^[-a-z0-9!#$%&'*+\/=?^_`{|}~]+(\.[-a-z0-9!#$%&'*+\/=?^_`{|}~]+)*@(([a-z0-9]([-a-z0-9]*[a-z0-9]+)?){1,63}\.)+([a-z0-9]([-a-z0-9]*[a-z0-9]+)?){2,63}$/i", $email)) {
        $errors[$fieldName] = $msg2;
    }
    return $email;
}
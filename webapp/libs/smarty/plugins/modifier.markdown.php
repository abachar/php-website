<?php
/**
 * Smarty plugin
 *
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Smarty markdown modifier plugin
 *
 * Type:     modifier<br>
 * Name:     markdown<br>
 *
 * @param string $string    string to parse
 *
 * @return string The modified output.
 */
function smarty_modifier_markdown($string)
{
    global $LIB_PATH;

    include_once("{$LIB_PATH}/markdown/markdown-extra.php");
    return MarkdownExtra::defaultTransform($string);
} 

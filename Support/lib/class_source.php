<?php
/**
 * This file is part of Symfony2 textmate bundle
 * It uses Symfony2 universal loader to retrieve class source path
 * @author Koh Sze Mian <szemian@gmail.com>
 */
if (!defined('PHP_VERSION_ID')) {
    $version = explode('.', PHP_VERSION);
    define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
}

if (PHP_VERSION_ID < 50302) {
    echo "Php version 5.3.2 and above required. Your php version is ".phpversion()."\nPrepend custom php path in Textmate Preferences > Advanced > Shell Variables > PATH";
}
else {

    require_once getenv('TM_PROJECT_DIRECTORY').'/app/bootstrap.php.cache';
    require 'resolve_namespace.php';

    $current_word = getenv('TM_CURRENT_WORD');
    
    if(strpos(getenv('TM_SCOPE'), 'entity.other.inherited-class.php') 
        || strpos(getenv('TM_SCOPE'), 'support.class.php')) {
        
        $current_word = resolveClassName($current_word, getenv('TM_FILEPATH'));
    }
    
    if($path = $loader->findFile($current_word)) {
        echo realpath($path);
    } else {
        echo 'Class ' . $current_word . ' source file not found.';
    }
}
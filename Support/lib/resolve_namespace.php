<?php
/**
 * This file is part of Symfony2 textmate bundle
 * It parse the source code to inspect a class namespace
 * @author Koh Sze Mian <szemian@gmail.com>
 */

function resolveClassName($className, $sourcePath) {
    $namespace = '';
    $imported = '';
    $inScope = false;

    $file = fopen($sourcePath, "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $line = trim($line);
            // analyze namespace 
            if(strpos($line, 'namespace')===0) {
                $namespace = str_replace('namespace', '', $line);
                $namespace = trim(str_replace(';', '', $namespace));                   
            }

            // analyze imported namespace
            if((strpos($line, 'use')===0) || $inScope) {
                if(strpos($line, ';') === false) {
                    $inScope = true;
                } else {
                    $inScope = false;
                    $line = trim(str_replace(';', '', $line));
                }

                $parts = explode(',', $line);

                foreach($parts as $part) {
                    $part = trim($part);
                    if(strrpos($part, $className)==(strlen($part) - strlen($className))) {
                        $imported = trim(str_replace('use', '', $part));                         
                        break(2);
                    }
                }
            }
        }
        fclose($file);
    }

    if(strpos($className, '\\')===0) { // full qualify name
        return substr($className, 1);
    }
    elseif($imported) {
        // remove 'as' keyword and namespace alias if existed
        if($pos = strpos($imported, ' as ')) {
            $imported = trim(substr($imported, 0, $pos));
        }
        return $imported;
    } elseif($namespace) {
        return $namespace . '\\' . $className;
    } else {
        return $className;
    }
}

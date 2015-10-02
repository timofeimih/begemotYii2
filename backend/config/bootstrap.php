<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 */

function import($namespace)
{
    static $registered = false;
    static $paths = [];
    static $classMap = [];
 
    if (!$registered) {
        spl_autoload_register(function($class) use(&$paths, &$classMap) {
            if (empty($paths) && empty($classMap)) {
                return;
            }
            if (strpos($class, '\\') === false) {
                if (isset($classMap[$class])) {
                    return class_alias($classMap[$class], $class);
                } else {
                    $baseFile = '/' . str_replace('_', '/', $class) . '.php';
                    foreach ($paths as $namespace => $path) {
                        if (is_file($path . $baseFile)) {
                            return class_alias($namespace . '\\' . $class, $class);
                        }
                    }
                }
            }
        });
        $registered = true;
    }
    if (($pos = strrpos($namespace, '\\')) !== false) {
        $ns = trim(substr($namespace, 0, $pos), '\\');
        $alias = substr($namespace, $pos + 1);
        if ($alias === '*') {
            if (!isset($paths[$ns]) || $paths[$ns] === false) {
                $paths[$ns] = Yii::getAlias('@' . str_replace('\\', '/', $ns), false);
            }
        } elseif (!empty($alias)) {
            $classMap[$alias] = trim($namespace, '\\');
        }
    } else {
        throw new yiibaseInvalidParamException("Invalid import alias: $namespace");
    }
}
<?php
// Path aliases
Yii::setAlias('@base', realpath(__DIR__.'/../../'));
Yii::setAlias('@common', realpath(__DIR__.'/../../common'));
Yii::setAlias('@frontend', realpath(__DIR__.'/../../frontend'));
Yii::setAlias('@backend', realpath(__DIR__.'/../../backend'));
Yii::setAlias('@console', realpath(__DIR__.'/../../console'));
Yii::setAlias('@storage', realpath(__DIR__.'/../../storage'));
Yii::setAlias('@tests', realpath(__DIR__.'/../../tests'));

// Url Aliases
Yii::setAlias('@frontendUrl', getenv('FRONTEND_URL'));
Yii::setAlias('@backendUrl', getenv('BACKEND_URL'));
Yii::setAlias('@storageUrl', getenv('STORAGE_URL'));


//Module Alias
Yii::setAlias('@catalog', realpath(__DIR__.'/../../backend/modules/catalog'));


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
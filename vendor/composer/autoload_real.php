<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit7795f3dbbb7b4ba30578b6b4a8cf6e9a
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit7795f3dbbb7b4ba30578b6b4a8cf6e9a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit7795f3dbbb7b4ba30578b6b4a8cf6e9a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit7795f3dbbb7b4ba30578b6b4a8cf6e9a::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInit7795f3dbbb7b4ba30578b6b4a8cf6e9a::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire7795f3dbbb7b4ba30578b6b4a8cf6e9a($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire7795f3dbbb7b4ba30578b6b4a8cf6e9a($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
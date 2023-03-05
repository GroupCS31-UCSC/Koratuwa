<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitae6ad644d2ff69bf6f9532adc5c14831
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

        spl_autoload_register(array('ComposerAutoloaderInitae6ad644d2ff69bf6f9532adc5c14831', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitae6ad644d2ff69bf6f9532adc5c14831', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitae6ad644d2ff69bf6f9532adc5c14831::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}

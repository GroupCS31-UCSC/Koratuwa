<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae6ad644d2ff69bf6f9532adc5c14831
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitae6ad644d2ff69bf6f9532adc5c14831::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae6ad644d2ff69bf6f9532adc5c14831::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitae6ad644d2ff69bf6f9532adc5c14831::$classMap;

        }, null, ClassLoader::class);
    }
}

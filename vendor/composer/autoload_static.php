<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6109e61e36b71157b12be586efe2dd1d
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Midtrans\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Midtrans\\' => 
        array (
            0 => __DIR__ . '/..' . '/midtrans/midtrans-php/Midtrans',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6109e61e36b71157b12be586efe2dd1d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6109e61e36b71157b12be586efe2dd1d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6109e61e36b71157b12be586efe2dd1d::$classMap;

        }, null, ClassLoader::class);
    }
}

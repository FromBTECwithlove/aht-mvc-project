<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb8e82b9011f27371109cf0270316cefc
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MVC_Project\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MVC_Project\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb8e82b9011f27371109cf0270316cefc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb8e82b9011f27371109cf0270316cefc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb8e82b9011f27371109cf0270316cefc::$classMap;

        }, null, ClassLoader::class);
    }
}

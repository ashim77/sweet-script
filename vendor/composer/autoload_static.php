<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit478e62292134489194736639536c1163
{
    public static $files = array (
        '053a1f050535f88d2a6a6092710e5187' => __DIR__ . '/../..' . '/includes/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sweet\\Script\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sweet\\Script\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit478e62292134489194736639536c1163::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit478e62292134489194736639536c1163::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit478e62292134489194736639536c1163::$classMap;

        }, null, ClassLoader::class);
    }
}

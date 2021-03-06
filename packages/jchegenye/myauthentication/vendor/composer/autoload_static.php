<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7b6a70d27aed915a043cf61edbbe268b
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'Jchegenye\\MyAuthentication\\Http\\Controllers\\' => 44,
            'Jchegenye\\MyAuthentication\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Jchegenye\\MyAuthentication\\Http\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Http/controllers',
        ),
        'Jchegenye\\MyAuthentication\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7b6a70d27aed915a043cf61edbbe268b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7b6a70d27aed915a043cf61edbbe268b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

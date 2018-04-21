<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit25ff45e502b6851c55b59928708c9072
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TYPO3Fluid\\Fluid\\' => 17,
        ),
        'M' => 
        array (
            'Marina\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TYPO3Fluid\\Fluid\\' => 
        array (
            0 => __DIR__ . '/..' . '/typo3fluid/fluid/src',
        ),
        'Marina\\' => 
        array (
            0 => __DIR__ . '/../..' . '/marina',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit25ff45e502b6851c55b59928708c9072::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit25ff45e502b6851c55b59928708c9072::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

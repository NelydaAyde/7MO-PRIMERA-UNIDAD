<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5af562fa94bdc52df5e1865bb57088cf
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
        'FPDF' => __DIR__ . '/..' . '/setasign/fpdf/fpdf.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5af562fa94bdc52df5e1865bb57088cf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5af562fa94bdc52df5e1865bb57088cf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5af562fa94bdc52df5e1865bb57088cf::$classMap;

        }, null, ClassLoader::class);
    }
}

<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita5dc5fc57f608b562cfc9a0568199f68
{
    public static $classMap = array (
        'PdfCrowd' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'PdfcrowdException' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'Pdfcrowd\\ConnectionHelper' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'Pdfcrowd\\Error' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'Pdfcrowd\\HtmlToImageClient' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'Pdfcrowd\\HtmlToPdfClient' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'Pdfcrowd\\ImageToImageClient' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'Pdfcrowd\\ImageToPdfClient' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'Pdfcrowd\\PdfToPdfClient' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInita5dc5fc57f608b562cfc9a0568199f68::$classMap;

        }, null, ClassLoader::class);
    }
}

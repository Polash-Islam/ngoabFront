<?php


//$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
//$fontDirs = $defaultConfig['fontDir'];
//
//$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
//$fontData = $defaultFontConfig['fontdata'];

//$mpdf = new \Mpdf\Mpdf([
//    'fontDir' => array_merge($fontDirs, [
//        __DIR__ . '/ttfonts',
//    ]),
//    'fontdata' => $fontData + [
//            'nikosh' => [
//                'R' => 'Nikosh.ttf',
//            ],
//        ],
//    'default_font' => 'nikosh'
//]);

return [
    'font_path' => resource_path('fonts'),
    'fonts' => [
        'nikosh' => [
            'R' => 'Nikosh.ttf',
        ],
    ],
    'default_font' => 'nikosh',
];

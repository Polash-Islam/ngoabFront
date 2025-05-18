<?php

    namespace App\Traits;

    trait  Mpdf
    {
        public function getMpdf(){
            return new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                'format' => 'A4',
                'fontDir' => [resource_path('fonts')],
                'fontdata' => [
                    'nikosh' => [
                        'R' => 'Nikosh.ttf',
                    ],
                ],
                'default_font' => 'nikosh',
            ]);
        }
    }

<?php

namespace App\Utils;

class IncomeTaxDTO {

    public static function getIncomeTaxSlabs()
    {
        return [
            2018 => [
                'slabs' => [
                    new IncomeTaxSlab(0, 100000, 0),
                    new IncomeTaxSlab(10, 100001, 500000),
                    new IncomeTaxSlab(20, 500001, 1000000),
                    new IncomeTaxSlab(30, 1000001)
                ]
            ]
        ];
    }
}
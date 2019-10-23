<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class MathTest extends TestCase
{
    protected $mappings = [
        1 => 1,
        100 => '1C',
        1000000 => '4c92',
        999999999 => '15FTGf',
    ];

    /** @test */
    public function correctly_encoded_vales()
    {
        $math = new \App\Helpers\Math;

        // dd($math->toBase(999999999));

        foreach ($this->mappings as $value => $encoded) {
            $this->assertEquals($encoded, $math->toBase($value));
        }
    }
}

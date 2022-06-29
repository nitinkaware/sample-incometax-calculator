<?php

namespace Tests\Unit;

use App\Utils\IncomeTaxCalculator;
use Exception;
use PHPUnit\Framework\TestCase;

class CalculateIncomeTaxTest extends TestCase
{
    /**
     * Given the year, it should calculate the correct tax
     *
     * @return void
     */
    public function test_it_should_calculate_the_tax_given_year_and_income()
    {
        $incomeTaxCalculator = new IncomeTaxCalculator(2018, 1000000);
        $this->assertEquals($incomeTaxCalculator->calculate(), 140000);

        $incomeTaxCalculator = new IncomeTaxCalculator(2018, 2000000);
        $this->assertEquals($incomeTaxCalculator->calculate(), 440000);

        $incomeTaxCalculator = new IncomeTaxCalculator(2018, 2400000);
        $this->assertEquals($incomeTaxCalculator->calculate(), 440000 + 120000);
    }
}

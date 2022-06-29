<?php

namespace App\Utils;

class IncomeTaxCalculator
{
    private $incomeYear = null;

    private $incomeAmount = null;

    public function __construct($incomeYear, $incomeAmount)
    {
        $this->incomeYear = $incomeYear;
        
        $this->incomeAmount = $incomeAmount;

        $this->incomeTaxSlabs = IncomeTaxDTO::getIncomeTaxSlabs();
        
        if(! $this->incomeTaxSlabs[$this->incomeYear]) {
            throw new \Exception("Invalid Year");
        }
    }

    public function calculate()
    {
        $slabs = $this->incomeTaxSlabs[$this->incomeYear]['slabs'];

        return collect($slabs)
        ->filter
        ->isTaxSlabApplicationForIncome($this->incomeAmount)
        ->reduce(function ($carry, IncomeTaxSlab $slab) {
            return $carry + $slab->getApplicableTax($this->incomeAmount);
        });
    }
}

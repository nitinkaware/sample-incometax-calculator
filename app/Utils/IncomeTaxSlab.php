<?php

namespace App\Utils;

class IncomeTaxSlab
{
    public $startsAt = null;

    public $endsAt = null;

    public $taxPercentage = null;

    public function __construct($taxPercentage, $startsAt, $endsAt = null)
    {
        $this->startsAt = $startsAt;
        $this->endsAt = $endsAt;
        $this->taxPercentage = $taxPercentage;
    }

    public function isTaxSlabApplicationForIncome($incomeAmount)
    {
        if(isset($this->endsAt)) {
            return $this->endsAt <= $incomeAmount;
        }

        return $this->startsAt <= $incomeAmount;
    }

    public function getApplicableTax($incomeAmount)
    {
        if(isset($this->endsAt)) {
            $totalPossibleIncomeInSlab = $this->endsAt - $this->startsAt;    
        } else {
            $totalPossibleIncomeInSlab = $incomeAmount - $this->startsAt;
        }
        
        $taxForSlab = ceil(
            ($totalPossibleIncomeInSlab * $this->taxPercentage) / 100
        );
        
        return $taxForSlab;
    }
}
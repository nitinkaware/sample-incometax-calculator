<?php

namespace App\Console\Commands;

use App\Utils\IncomeTaxCalculator;
use Illuminate\Console\Command;

class CalculateIncomeTaxCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:incometax';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description {income} {year}';

    private $incomeTaxCalculator = null;

    // public function __construct(IncomeTaxCalculator $incomeTaxCalculator)
    // {
    //     $this->incomeTaxCalculator = $incomeTaxCalculator;
    // }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $income = $this->argument('income');

        $incomeYear = $this->argument('incomeYear');

        dd($income, $incomeYear);
    }
}

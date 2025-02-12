<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\StagedFeeCalculatorService;

class StagedFeeServiceTest extends TestCase
{

    protected $fee = [
        [ 'income_min' => 0, 'income_max' => 3750 - 1, 'percent' => 37.50 ],
        [ 'income_min' => 3750, 'income_max' => 7500 - 1, 'percent' => 36.25 ],
        [ 'income_min' => 7500, 'income_max' => 11250 - 1, 'percent' => 35.00 ],
        [ 'income_min' => 11250, 'income_max' => 15000 - 1, 'percent' => 33.75 ],
    ];


    public function test_success_fee_calculation_when_sell_is_in_first_stage(): void
    {
        $sells_count         = 10;
        $price               = 60;
        $percent             = 37.50;
        $total_pure_money    = 375;

        $result             = $this->executeCalculation($sells_count, $price);
        $total_unpure_money = (int) ( $sells_count * $price );

        $this->assertEquals($total_unpure_money, (int) $result[ 'total_unpure_money' ]);
        $this->assertEquals($total_pure_money, (int) $result[ 'pure_earned' ]);
        $this->assertEquals($percent, $result[ 'stage_percent' ]);

    }

    public function test_success_fee_calculation_when_sell_is_in_middle_stage(): void
    {

        $sells_count         = 70;
        $price               = 60;
        $percent             = 36.25;
        $total_pure_money    = 2630;

        $result             = $this->executeCalculation($sells_count, $price);
        $total_unpure_money = (int) ( $sells_count * $price );

        $this->assertEquals($total_unpure_money, (int) $result[ 'total_unpure_money' ]);
        $this->assertEquals($total_pure_money, (int) $result[ 'pure_earned' ]);
        $this->assertEquals($percent, $result[ 'stage_percent' ]);

    }

    public function test_success_fee_calculation_when_sell_is_in_last_stage(): void
    {
        $sells_count         = 190;
        $price               = 60;
        $percent             = 33.75;
        $total_pure_money    = 7269;

        $result             = $this->executeCalculation($sells_count, $price);
        $total_unpure_money = (int) ( $sells_count * $price );

        $this->assertEquals($total_unpure_money, (int) $result[ 'total_unpure_money' ]);
        $this->assertEquals($total_pure_money, (int) $result[ 'pure_earned' ]);
        $this->assertEquals($percent, $result[ 'stage_percent' ]);

    }

    protected function executeCalculation(float $sells_count, float $price): array
    {
        $fee = $this->fee;
        $stagedFeeCalculator = StagedFeeCalculatorService::getInstance($fee);
        return $stagedFeeCalculator->calculateFee($sells_count, $price);
    }
}

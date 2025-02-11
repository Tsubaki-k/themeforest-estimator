<?php

namespace App\Services;

class StagedFeeCalculatorService
{

    private static ?StagedFeeCalculatorService $instance = null;
    private array $fee;

    /*
     * Private constructor to prevent direct instantiation
     */
    private function __construct(array $fee)
    {
        $this->fee = $fee;
    }

    /*
     * Singleton Instance Getter
     */
    public static function getInstance(array $fee): StagedFeeCalculatorService
    {
        if (self::$instance === null) {
            self::$instance = new self($fee);
        }
        return self::$instance;
    }

    // Method to calculate the pure earned fee based on the given income
    public function calculateFee( float $sells_count, float $price ): array
    {
        $fee                = $this->fee;
        $total_unpure_money = $sells_count * $price;

        $stage_product = 0;
        $pure_earned   = 0;

        foreach( $fee as $stage => $stage_data ) {

            $income_min = $stage_data[ 'income_min' ];
            $income_max = $stage_data[ 'income_max' ];
            $percent    = $stage_data[ 'percent' ];

            if( $total_unpure_money > $income_max ) {
                $income_of_this_stage   = $income_max - $income_min;
                $fee_of_this_stage      = $income_of_this_stage * $percent / 100;
                $earned_from_this_stage = $income_of_this_stage - $fee_of_this_stage;
                $pure_earned            += $earned_from_this_stage;
            }
            else {
                $income_of_this_stage   = $total_unpure_money - $income_min;
                $fee_of_this_stage      = ( $income_of_this_stage ) * $percent / 100;
                $earned_from_this_stage = $income_of_this_stage - $fee_of_this_stage;
                $stage_product          = $stage;
                $pure_earned            += $earned_from_this_stage;
                break;
            }

        }

        return [
               'total_unpure_money' => $total_unpure_money,
               'pure_earned'        => $pure_earned,
//               'stage_product'      => $stage_product,
               'stage_percent'      => $fee[ $stage_product ][ 'percent' ],
           ];
    }


}

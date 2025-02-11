<?php

namespace App\Http\Controllers;

use App\Models\EstimateByCustomData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use App\Services\ThemeforestCalculatorService;
use App\Services\StagedFeeCalculatorService;
use App\Enums\CurrencyEnum;

class EstimateByDataResultController extends Controller
{

    public function show( $hash )
    {
        $results = [];

        // If no hash is provided, return a 404 response
        if( !$hash ) {
            return abort(404);
        }

        // Retrieve the model from cache or database if not cached
        $model = Cache::remember($hash, 60 * 60 * 60, function () use ( $hash ) {
            return EstimateByCustomData::where('key', $hash)->first();
        });

        // if no Model is provided, return a 404 response
        if( !$model ) {
            return abort(404);
        }

        $created_date       = $model->publish_date;
        $sells_count        = $model->sells;
        $price              = $model->price;
        $second_price       = $model->second_price;
        $themeforest_fee    = config('themeforest_data.fee');
        $StagedFeeCalulator = StagedFeeCalculatorService::getInstance($themeforest_fee);
        $calculate_fee      = $StagedFeeCalulator->calculateFee($sells_count, $price);
        //                dd($calculate_fee);

        $total_unpure_money = $calculate_fee[ 'total_unpure_money' ];
        $pure_earned        = $calculate_fee[ 'pure_earned' ];
        $carbon_date        = ( new Carbon($created_date) );
        $total_Day          = round($carbon_date->diffInDays());
        $pure_money_daily   = $pure_earned / $total_Day;
        $pure_money_weekly  = $pure_money_daily * 7;
        $pure_money_monthly = $pure_money_daily * 30;
        $pure_money_six     = $pure_money_monthly * 6;
        $pure_money_yearly  = $pure_money_monthly * 12;

        $results = [
            'published_date'           => $carbon_date->format('Y M d'),
            'price'                    => $price,
            'sells'                    => number_format($sells_count),
            'second_price'             => number_format($second_price),
            'age'                      => $carbon_date->diffForHumans(),
            'age_by_day'               => $total_Day,
            'fee_stage_percent'        => $calculate_fee[ 'stage_percent' ],
            'total_income'             => [
                'total' => [
                    'price'        => number_format($total_unpure_money),
                    'second_price' => number_format($this->calc_price_by_currency_value($total_unpure_money, $second_price)),
                ],
                'pure'  => [
                    'price'        => number_format($pure_earned),
                    'second_price' => number_format($this->calc_price_by_currency_value($pure_earned, $second_price)),
                ],
            ],
            'average_per'              => [
                'day'       => [
                    'price'        => round($pure_money_daily, 2),
                    'second_price' => number_format($this->calc_price_by_currency_value($pure_money_daily, $second_price)),
                ],
                'week'      => [
                    'price'        => number_format($pure_money_weekly),
                    'second_price' => number_format($this->calc_price_by_currency_value($pure_money_weekly, $second_price)),
                ],
                'month'     => [
                    'price'        => number_format($pure_money_monthly),
                    'second_price' => number_format($this->calc_price_by_currency_value($pure_money_monthly, $second_price)),
                ],
                'six_month' => [
                    'price'        => number_format($pure_money_six),
                    'second_price' => number_format($this->calc_price_by_currency_value($pure_money_six, $second_price)),
                ],
                'one_year'  => [
                    'price'        => number_format($pure_money_yearly),
                    'second_price' => number_format($this->calc_price_by_currency_value($pure_money_yearly, $second_price)),
                ],
            ],
            'price_currency'           => $model->price_currency->character(),
            'second_price_currency'    => $model->second_price_currency->character(),
            'is_second_price_avalible' => !!$second_price,
        ];

        return Inertia::render('Estimator/Result', [
            'page_data' => $results,
        ]);
    }

    protected function calc_price_by_currency_value( $price, $currency_value )
    {
        return $price * $currency_value;
    }
}

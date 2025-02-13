<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\EstimateByCustomData;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EstimateByCustomData>
 */
class EstimateByCustomDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = EstimateByCustomData::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key'                   => Str::random(24),
            'sells'                 => rand(1, 2000),
            'price'                 => rand(10, 80),
            'price_currency'        => 'usd',
            'second_price'          => rand(10, 80),
            'second_price_currency' => 'eur',
            'publish_date'          => Carbon::createFromTimestamp(rand(strtotime('2017-01-01'), now()->timestamp))->format('Y-m-d'),
        ];
    }
}

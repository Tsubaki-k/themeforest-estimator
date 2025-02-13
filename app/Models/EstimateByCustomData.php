<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\CurrencyEnum;
use Database\Factories\EstimateByCustomDataFactory;

class EstimateByCustomData extends Model
{
    use HasFactory;

    protected $casts = [
        'price_currency'        => CurrencyEnum::class,
        'second_price_currency' => CurrencyEnum::class,
    ];

    protected $fillable = [
        'key',
        'sells',
        'price',
        'price_currency',
        'second_price',
        'second_price_currency',
        'publish_date',
    ];

    protected static function newFactory()
    {
        return EstimateByCustomDataFactory::new();
    }

}

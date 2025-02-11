<?php

namespace App\Enums;

enum CurrencyEnum: string
{
    case AUD = 'aud';
    case BRL = 'brl';
    case CAD = 'cad';
    case CHF = 'chf';
    case CNY = 'cny';
    case EUR = 'eur';
    case GBP = 'gbp';
    case HKD = 'hkd';
    case IDR = 'idr';
    case INR = 'inr';
    case IRT = 'irt';
    case JPY = 'jpy';
    case KRW = 'krw';
    case MXN = 'mxn';
    case MYR = 'myr';
    case NOK = 'nok';
    case NZD = 'nzd';
    case RUB = 'rub';
    case SAR = 'sar';
    case SEK = 'sek';
    case SGD = 'sgd';
    case THB = 'thb';
    case TRY = 'try';
    case USD = 'usd';
    case ZAR = 'zar';


    public function label(): string
    {
        return match ( $this ) {
            self::AUD => 'AUD - $',
            self::BRL => 'BRL - R$',
            self::CAD => 'CAD - $',
            self::CHF => 'CHF - CHF',
            self::CNY => 'CNY - ¥',
            self::EUR => 'EUR - €',
            self::GBP => 'GBP - £',
            self::HKD => 'HKD - $',
            self::IDR => 'IDR - Rp',
            self::INR => 'INR - ₹',
            self::IRT => 'IRT - T',
            self::JPY => 'JPY - ¥',
            self::KRW => 'KRW - ₩',
            self::MXN => 'MXN - $',
            self::MYR => 'MYR - RM',
            self::NOK => 'NOK - kr',
            self::NZD => 'NZD - $',
            self::RUB => 'RUB - ₽',
            self::SAR => 'SAR - ﷼',
            self::SEK => 'SEK - kr',
            self::SGD => 'SGD - $',
            self::THB => 'THB - ฿',
            self::TRY => 'TRY - ₺',
            self::USD => 'USD - $',
            self::ZAR => 'ZAR - R',
        };
    }


    public function character(): string
    {
        return match ( $this ) {
            self::AUD => '$',
            self::BRL => 'R$',
            self::CAD => '$',
            self::CHF => 'CHF',
            self::CNY => '¥',
            self::EUR => '€',
            self::GBP => '£',
            self::HKD => '$',
            self::IDR => 'Rp',
            self::INR => '₹',
            self::IRT => 'T',
            self::JPY => '¥',
            self::KRW => '₩',
            self::MXN => '$',
            self::MYR => 'RM',
            self::NOK => 'kr',
            self::NZD => '$',
            self::RUB => '₽',
            self::SAR => '﷼',
            self::SEK => 'kr',
            self::SGD => '$',
            self::THB => '฿',
            self::TRY => '₺',
            self::USD => '$',
            self::ZAR => 'R',
        };
    }


    /**
     * generate all values as an associative array for a select box.
     */
    public static function toArray(): array
    {
        return array_map(fn($case) => ['value' => $case->value, 'label' => $case->label()], self::cases());
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\CurrencyEnum;

class EstimateByCustomDataRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $data            = [];
        $fieldsWithComma = [
            'sells',
            'price',
            'second_price',
        ];

        foreach( $fieldsWithComma as $field ) {
            $thisField = $this->$field;
            if( $thisField !== null ) {
                $data[ $field ] = (int) ( str_replace(',', '', $thisField) );
            }
        }

        $data[ 'key' ] = \Illuminate\Support\Str::random(24);

        $this->merge($data);
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sells'                 => 'required|numeric',
            'price'                 => 'required|numeric',
            'price_currency'        => ['required', new Enum(CurrencyEnum::class)],
            'second_price'          => 'nullable|numeric',
            'second_price_currency' => ['nullable', new Enum(CurrencyEnum::class)],
            'publish_date'          => 'required|date_format:Y-m-d|before:today',
        ];
    }
}

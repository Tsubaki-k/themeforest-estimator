<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstimateByCustomDataRequest;
use App\Models\EstimateByCustomData;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Enums\CurrencyEnum;

class EstimateByCustomDataController extends Controller
{

    public function create( Request $request ): Response
    {
        return Inertia::render('Estimator/ByData', [
            'achived_data' => [
                'price_currencies' => CurrencyEnum::toArray()
            ]
        ]);
    }


    function store( EstimateByCustomDataRequest $request )
    {

        $estimated = EstimateByCustomData::create($request->all());

        return redirect()->route('estimate.data.result', [ 'hash' => $request->key ]);
    }

}

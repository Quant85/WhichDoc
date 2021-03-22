<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BraintreeController extends Controller
{

    //
    public function index()
    {
        $braintree = config('braintree');
        $clienttoken = $braintree->clientToken()->generate();
        return $clienttoken;
    }
    public function post(Request $request)
    {

        $nonceFromTheClient = $request->payment_method_nonce;
        $braintree = config('braintree');
        $result = $braintree->transaction()->sale([
            'amount' => '9.99',
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);
        return redirect()->route('braintree');
    }
}

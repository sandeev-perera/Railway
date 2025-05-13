<?php

namespace App\Http\Controllers;

use App\Http\Requests\OnlinePaymentRequest;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show($type, OnlinePaymentRequest $request){
        $data = $request;
        return view('passenger.payment', compact('data'));
    }
}

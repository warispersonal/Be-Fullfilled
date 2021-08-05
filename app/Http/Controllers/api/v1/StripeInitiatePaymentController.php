<?php

namespace App\Http\Controllers\api\v1;

use App\Constant\FileConstant;
use App\Http\Controllers\Controller;
use App\StripeInitiatePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Customer;
use Stripe\EphemeralKey;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class StripeInitiatePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Stripe::setApiKey(FileConstant::STRIPE_API_KEY);
        $customer = Customer::create();
        $ephemeralKey = EphemeralKey::create(
            ['customer' => $customer->id],
            ['stripe_version' => '2020-08-27']
        );
        $paymentIntent = PaymentIntent::create([
            'amount' => 50,
            'currency' => 'usd',
            'customer' => $customer->id
        ]);
        $stripe_payment = new StripeInitiatePayment();
        $stripe_payment->paymentIntent = $paymentIntent->client_secret;
        $stripe_payment->ephemeralKey = $ephemeralKey->secret;
        $stripe_payment->customer = $customer->id;
        $stripe_payment->user_id = 1;
        $stripe_payment->save();
        return response([
            'paymentIntent' => $paymentIntent->client_secret,
            'ephemeralKey' => $ephemeralKey->secret,
            'customer' => $customer->id,
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\StripeInitiatePayment $stripeInitiatePayment
     * @return \Illuminate\Http\Response
     */
    public function show(StripeInitiatePayment $stripeInitiatePayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\StripeInitiatePayment $stripeInitiatePayment
     * @return \Illuminate\Http\Response
     */
    public function edit(StripeInitiatePayment $stripeInitiatePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\StripeInitiatePayment $stripeInitiatePayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StripeInitiatePayment $stripeInitiatePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\StripeInitiatePayment $stripeInitiatePayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(StripeInitiatePayment $stripeInitiatePayment)
    {
        //
    }
}

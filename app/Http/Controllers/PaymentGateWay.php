<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Ixudra\Curl\Facades\Curl;

class PaymentGateWay extends Controller
{
    public function seting(){
        Config::$serverKey = 'U0ItTWlkLXNlcnZlci1sV3JtYzU5ZjkxNEFxOFY1X0gwVUlIcU46';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        // Config::$is3ds = true;
    }

    public function base64yaa($end){
        return base64_encode($end);
    }

    public function getVa($amount, $kdbook, $userid, $bank){
        // $curl = curl_init();

        $data = array(
            "payment_type" => "bank_transfer",
            "transaction_details" => array(
                "gross_amount" => $amount,
                "order_id" => $kdbook
            ),
            "bank_transfer" => array(
                "bank" => $bank,
                "va_number" => $userid
                )
        );
        $header = array('Accept: application/json',
                'Authorization: Basic U0ItTWlkLXNlcnZlci1sV3JtYzU5ZjkxNEFxOFY1X0gwVUlIcU46',
                'Content-Type: application/json');
        $response = Curl::to('https://api.sandbox.midtrans.com/v2/charge')
        ->withHeader('Accept: application/json')
        ->withHeader('Authorization: Basic U0ItTWlkLXNlcnZlci1sV3JtYzU5ZjkxNEFxOFY1X0gwVUlIcU46')
        ->withHeader('Content-Type: application/json')
        ->withData( $data )
        ->asJson()
        ->post();
        // return $response;
        return response()->json($response);
        // $payload = json_encode($data);

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/charge",
        //     CURLOPT_CUSTOMREQUEST => "POST",
        //     CURLOPT_HTTPHEADER => array(
        //         // Set Here Your Requesred Headers
        //         'Accept: application/json',
        //         'Authorization: Basic U0ItTWlkLXNlcnZlci1sV3JtYzU5ZjkxNEFxOFY1X0gwVUlIcU46',
        //         'Content-Type: application/json',
        //     ),
        //     CURLOPT_POSTFIELDS => $payload,
        // ));
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        // curl_close($curl);

        // if ($err) {
        //     return "cURL Error #:" . $err;
        // } else {
        //     return response()->json(json_encode($response));
        // }
    }
}

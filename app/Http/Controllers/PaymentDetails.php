<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentDetails extends Controller
{
    //
    public function fetch_payments(Request $request)
    {

        // dd($request->all());

        $start_date = $request->start_date;
        $end_date = $request->end_date;


        if ($start_date && $end_date) {

            // dd($request->all());
            $url = 'https://api-m.sandbox.paypal.com/v1/reporting/transactions?fields=transaction_info%2Cpayer_info%2Cshipping_info%2Cauction_info%2Ccart_info%2Cincentive_info%2Cstore_info&start_date=' . $start_date . '&end_date=' . $end_date;

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer A21AAItTHjWgt4lsMSisEruHrAyXp8q9eT5DAgnxoPGJ34zkYn2wiz8e0zP2ICJFVHG7HMG4Sq-kC2-wXg4k6zBiAFa8rcbFA'
                  ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            // echo $response;

            $jsonData = json_decode($response, true);
            // dd($jsonData);

            if (json_last_error() === JSON_ERROR_NONE) {
                // Data is in valid JSON format.
                return response()->json($jsonData);

                return response($data);

            }

        } else {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v1/reporting/transactions?fields=transaction_info%2Cpayer_info%2Cshipping_info%2Cauction_info%2Ccart_info%2Cincentive_info%2Cstore_info&start_date=2023-12-01T00%3A00%3A00Z&end_date=2023-12-31T23%3A59%3A59Z',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer A21AAItTHjWgt4lsMSisEruHrAyXp8q9eT5DAgnxoPGJ34zkYn2wiz8e0zP2ICJFVHG7HMG4Sq-kC2-wXg4k6zBiAFa8rcbFA'
                  ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
// echo $response;

            $jsonData = json_decode($response, true);
            // dd($jsonData);

            if (json_last_error() === JSON_ERROR_NONE) {
                // Data is in valid JSON format.
                return response()->json($jsonData);

                return response($data);

            }
        }

    }
}

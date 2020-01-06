<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stelin\OVOID;

class OVOIDController extends Controller
{
    
    public function index($nomor){
        // $ovoid = new OVOID("eyJhbGciOiJSUzI1NiJ9.eyJleHBpcnlJbk1pbGxpU2Vjb25kcyI6NjA0ODAwMDAwLCJjcmVhdGVUaW1lIjoxNTc4MjIyMjUxMDYzLCJzZWNyZXQiOiJzS1lIak9ldlcvNnEvdE1Dam5hQ3NMV3NUZDQxaFQ4UE9MR0Q2QUgwNi9zbHhqcnFBYkpZOVJ5N09FMlNSYlVRaHdxMHdNOVJ2aUpGalkwdlVuMW9veklGWVJWVUE3SnZrUTRQakxuMGhvK3MvKzN6ZnJtdVdlTWxXMjgvVXBnQVY5K3ZhaEpPVFNCeGlieXhoanBZWThNT2FnZENKMWI2UUFhWXoyMS9Na254ZGwwNmJkNDJsT0JZTWlLYWNheEZBMDN2cFpqRXUyYkE4dmZ3R2d5cUNsZG9aWWplQUVsOWg3YXdPMUVXcDloa0pPTGd0ZlZrS1h6TTZvWXpQdmpKVldnYWJQNXp6aFA5ZTh6NlNKVVNtcS9hTktLelRkUlgvZzVPNk9zR0lyRnQ4S0lpazRqcDdaZVhBWDVUc2kvam5ubU1KSEtWZWUvUmlUMnZyc3BTSmxaQjdaamdmMkJ5cGMwZmNxQ3h2bEU9In0.vPjn6v__N8TCLZhV-GxWQ5eF0nldI9_eYvh0ug2NkExqnWLFJDZ8cCSeCuYNEmWXVlMfM40aOlt97w6VXPPy08VjpE-PqwBH4RWzy8Y3d-tgJUbVaUDH3x5MkkQv6cPN8xYhapaHX96E8AZs6hj85gNBvXIcBAjd6SErc0UdgdKeskbxmtRM-zv9dp7DSzmdtjcS7kc1Zn0HIInMP9xdd7aWolu1DkGeynpZ5aXNU-TxHjTSv9J-UlGzEHKVlOShAmfcuu6Gp9hbhT0MURLlkhi-3XKOIodEe-nUMt_0s2_IJfHx0mA6MEZy0hnDEguHxDfKVMftMEv-GU_cSx8-XA");
        // $ovoid->login2FA($nomor)->getRefId();
        // $accesToken = $ovoid->login2FAVerify('345aca0840cd4892a1fb0735b7fa1d55', '8618', $nomor)->getUpdateAccessToken();
        //dd($ovoid->allNotification());
        //$ovoid->balanceModel()->getBalance()->getCardBalance('OVO Cash');
        //getPaymentMethod();
        //getCardBalance('OVO');//$ovoid->loginSecurityCode('010799', 'eff1dd78ae0c4681ba910b711d2be626')->getAuthorizationToken();
        // $test = $ovoid->getWalletTransaction(1, 10);
        // $test->data->complete->merchant_id;
        // return json_decode($ovoid->getWalletTransaction(1, 10), false);//dd($test->data->complete->merchant_id);//dd($ovoid->getWalletTransaction(1, 10));
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ovo.id/wallet/v2/transaction?page=1&limit=10&productType=001",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
                'Authorization:eyJhbGciOiJSUzI1NiJ9.eyJleHBpcnlJbk1pbGxpU2Vjb25kcyI6NjA0ODAwMDAwLCJjcmVhdGVUaW1lIjoxNTc4MjIyMjUxMDYzLCJzZWNyZXQiOiJzS1lIak9ldlcvNnEvdE1Dam5hQ3NMV3NUZDQxaFQ4UE9MR0Q2QUgwNi9zbHhqcnFBYkpZOVJ5N09FMlNSYlVRaHdxMHdNOVJ2aUpGalkwdlVuMW9veklGWVJWVUE3SnZrUTRQakxuMGhvK3MvKzN6ZnJtdVdlTWxXMjgvVXBnQVY5K3ZhaEpPVFNCeGlieXhoanBZWThNT2FnZENKMWI2UUFhWXoyMS9Na254ZGwwNmJkNDJsT0JZTWlLYWNheEZBMDN2cFpqRXUyYkE4dmZ3R2d5cUNsZG9aWWplQUVsOWg3YXdPMUVXcDloa0pPTGd0ZlZrS1h6TTZvWXpQdmpKVldnYWJQNXp6aFA5ZTh6NlNKVVNtcS9hTktLelRkUlgvZzVPNk9zR0lyRnQ4S0lpazRqcDdaZVhBWDVUc2kvam5ubU1KSEtWZWUvUmlUMnZyc3BTSmxaQjdaamdmMkJ5cGMwZmNxQ3h2bEU9In0.vPjn6v__N8TCLZhV-GxWQ5eF0nldI9_eYvh0ug2NkExqnWLFJDZ8cCSeCuYNEmWXVlMfM40aOlt97w6VXPPy08VjpE-PqwBH4RWzy8Y3d-tgJUbVaUDH3x5MkkQv6cPN8xYhapaHX96E8AZs6hj85gNBvXIcBAjd6SErc0UdgdKeskbxmtRM-zv9dp7DSzmdtjcS7kc1Zn0HIInMP9xdd7aWolu1DkGeynpZ5aXNU-TxHjTSv9J-UlGzEHKVlOShAmfcuu6Gp9hbhT0MURLlkhi-3XKOIodEe-nUMt_0s2_IJfHx0mA6MEZy0hnDEguHxDfKVMftMEv-GU_cSx8-XA',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        //$data=['data'];

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            // $data = json_decode($response);
            // $hallo = $data[]
            // print_r(json_decode($response));
            // return $response;
            
            $decoded = json_decode($response, true);
            // foreach($decoded->data as $pendingBalance)
            // {
            // // echo "Pending balance of " . $pendingBalance->complete[0]."<br>";
            // }
            // foreach ($decoded as $emp) {
            //     return $emp['complete']['merchant_name']."<br/>";
            // }
            return $decoded->data;
        }
    }
}

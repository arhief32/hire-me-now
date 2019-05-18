<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-list-daerah/{province_id}', function($province_id){
    $curl = curl_init();

    if($province_id == 'all')
    {
        curl_setopt_array($curl, [
            CURLOPT_URL => "http://dev.farizdotid.com/api/daerahindonesia/provinsi",
            // CURLOPT_PROXY, "172.18.104.20:1707", 
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => [
                "Postman-Token: 855b4a19-8405-4049-acb6-64332b1eca1b",
                "cache-control: no-cache"
            ],
        ]);
    } else {
        curl_setopt_array($curl, [
            CURLOPT_URL => "http://dev.farizdotid.com/api/daerahindonesia/provinsi/".$province_id."/kabupaten",
            // CURLOPT_PROXY, "172.18.104.20:1707", 
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => [
                "Postman-Token: 855b4a19-8405-4049-acb6-64332b1eca1b",
                "cache-control: no-cache"
            ],
        ]);
    }

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    $response = json_decode($response);


    if ($err) {
        return response()->json("cURL Error #:" . $err);
    } else {
        return response()->json($response);
    }
});

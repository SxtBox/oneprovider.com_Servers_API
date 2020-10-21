<?php
/**

oneprovider.com Servers API

Make call to the OneProvider api
Implementation details
All calls are grouped by namespaces ("server", "vm", "store", "support").
Supported HTTP methods are GET and POST.
Any successful API call will return an HTTP code 200 with a JSON object.
Errors are returned with an HTTP code 8XX, a JSON object "error" with properties "message" and "code".
All API methods require authentication using both the API and CLIENT keys.

Using the API
To log into the API, you must use the two privates access keys below. These keys are unique and linked to your account.

Your Personal API key is: API_lhftwgb0D7IuFav1R4Qf1GMvVMVDwo3e
Your Secret CLIENT key is: CK_3OpmK2WSBP3mRVZzVF1tORZxNfHjR0Ig

Documentation
To use any function of the API, you must call it with the requested parameters and the access token* at this url: https://api.oneprovider.com/[action]
*/

// CHANGE THE TWO KEYS WITH YOURS, Get it From Your oneprovider.com Account
define("YOUR_API_KEY", "API_lhftwgb0D7IuFav1R4Qf1GMvVMVDwo3e");
define("YOUR_CLIENT_KEY", "CK_3OpmK2WSBP3mRVZzVF1tORZxNfHjR0Ig");

 function call_api($api_key, $client_key, $http_method, $endpoint, $get = array(), $post = array()) {
    if (!empty($get))  
    $endpoint .= '?' . http_build_query($get);

    $call = curl_init();
    curl_setopt($call, CURLOPT_URL, 'https://api.oneprovider.com' . $endpoint);
    curl_setopt($call, CURLOPT_HTTPHEADER, array('Api-Key: ' . $api_key, 'Client-Key: ' . $client_key, 'X-Pretty-JSON: 1'));
    curl_setopt($call, CURLOPT_RETURNTRANSFER, true);

    if ($http_method == 'POST') {
    curl_setopt($call, CURLOPT_POST, true);  
    curl_setopt($call, CURLOPT_POSTFIELDS, http_build_query($post));
    }
    elseif ($http_method == 'DELETE') {
    curl_setopt($call, CURLOPT_CUSTOMREQUEST, $http_method);
    }
    $result = curl_exec($call);
    return $result;
}

$api_key = YOUR_API_KEY;
$client_key = YOUR_CLIENT_KEY;
$server_list = call_api($api_key, $client_key, 'GET', '/server/list/');  
echo $server_list;

/**
You can try it now from your terminal
curl -H 'Api-Key: API_lhftwgb0D7IuFav1R4Qf1GMvVMVDwo3e' -H 'Client-Key: CK_3OpmK2WSBP3mRVZzVF1tORZxNfHjR0Ig' -A 'OneApi/1.0' https://api.oneprovider.com/server/list/
*/

/*
JSON OUTPUT
 
{
  "result": "success",
  "response": {
    "servers": [ 1 2 3 ETC ]
  }
}

*/

?>

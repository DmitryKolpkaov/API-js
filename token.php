<?php

$myCurl = curl_init();
curl_setopt_array($myCurl, array(
    CURLOPT_URL => 'https://dimas1gold.amocrm.ru/oauth2/access_token',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query(
        array(
            'client_id'=>$_POST['client_id'],
            'client_secret'=>$_POST['client_secret'],
            'grant_type'=>'authorization_code',
            'code'=>$_POST['code'],
            'redirect_uri'=>$_POST['redirect_uri']
        )
    )
));
$response = curl_exec($myCurl);
curl_close($myCurl);

$response = json_decode($response);

if (!empty($response->hint)){

header('location: /login.php?error='.$response->hint);


}else{
    file_put_contents(__DIR__.'/access_token.txt',$response->access_token);
    file_put_contents(__DIR__.'/refresh_token.txt',$response->refresh_token);
    header('location: /system.php');
}




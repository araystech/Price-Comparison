<?php

$link = "https://paytmmall.com/samsung-galaxy-a30-4-gb-64-gb-black-MOBSAMSUNG-GALAHARD400225D4BE73D-pdp?product_id=235306405&src=search-grid&sid=60a1c7d9-b883-48c1-bd2f-ca09fd5339ea&cid=66781";
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://arays.in/feeds/search/product_paytm.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"keyword\"\r\n\r\n".$link."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"apiid\"\r\n\r\n2147483647\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"apipass\"\r\n\r\nqcHNSX1j6GKu\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"apisecret\"\r\n\r\nMIiyf3pOgqj1JG\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
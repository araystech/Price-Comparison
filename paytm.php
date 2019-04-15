
<style>

#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}


table { border-collapse: collapse; width: 100%; }
th, td { background: #fff; padding: 8px 16px; }


.tableFixHead {
  overflow: auto;
  height: 100px;
}

.tableFixHead thead th {
  position: sticky;
  top: 0;
}




</style>


<?php

$keyword = $_GET['query'];

$apiid = "YOUR API ID";   
$apipass = "YOUR API PASSWORD";
$apisec = "YOUR API SECRET";

if($keyword != '')
{
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://arays.in/feeds/search/paytm.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"keyword\"\r\n\r\n".$keyword."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"apiid\"\r\n\r\n".$apiid."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"apipass\"\r\n\r\n".$apipass."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"apisecret\"\r\n\r\n".$apisec."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
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
 // echo $response;
}
    
    

}




?>


<form method="get">
<input type="text" name="query">
<input type="submit">
</form>


<table id="customers" class="tableFixHead" style="width:100%">

<thead  >
<tr>
<th>Id</th>
<th>Name</th>
<th>Image</th>
<th>Price</th>
<th>Link</th>

</tr>

 </thead>

 <tbody>
<?php

$abc = json_decode($response);


$size = $abc->products;

$count = count($size);
//echo $count;

for($i = 0; $i < $count; $i++)
{
  $name = $size[$i]->product_name;
  $image = $size[$i]->product_img;  
  $price = $size[$i]->product_price;
 
$url = $size[$i]->product_link;






  // your work
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $name;?></td>
<td><img src="<?php echo $image;?>" height="100px" width="100px"></td>
<td><?php echo $price;?></td>
<td><button type="button" onclick="window.location.href='<?=$url?>'">Link</button></td>
</tr>
<?php

}
?>

 </tbody>
 </table>




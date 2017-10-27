<?php
// set variables
$queryUrl = "http://api.kairos.com/detect";
$imageObject = '{"image":"YOUR URL"}';
$APP_ID = "33017e6a";
$APP_KEY = "cee992d5f99332640ccf52fee8aa19d9";
$request = curl_init($queryUrl);
// set curl options
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request,CURLOPT_POSTFIELDS, $imageObject);
curl_setopt($request, CURLOPT_HTTPHEADER, array(
        "Content-type: application/json",
        "app_id:" . $APP_ID,
        "app_key:" . $APP_KEY
    )
);
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($request);
// show the API response
echo $response;
// close the session
curl_close($request);

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = $response;
fwrite($myfile, $txt);
fclose($myfile);

?>

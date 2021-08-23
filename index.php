<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://www.learnwebservices.com/services/hello?WSDL",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS =>
        "<soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\">\n
	  <soapenv:Header/>\n
	  <soapenv:Body>\n
	      <SayHello xmlns=\"http://learnwebservices.com/services/hello\">\n
		     <HelloRequest>
                <Name>{$_GET['name']}</Name>
             </HelloRequest>
		  </SayHello>
	  </soapenv:Body>\n
  </soapenv:Envelope>",
    CURLOPT_HTTPHEADER => array("content-type: text/xml"),
));

$response = curl_exec($curl);

$err = curl_error($curl);

curl_close($curl);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}



//ini_set('display_errors','On');

//$client = new SoapClient("http://www.dataaccess.com/webservicesserver/numberconversion.wso?WSDL");
//
//$response = $client->SayHello(array(
//    'HelloRequest'=>(array(
//        'Name' =>
//    ))
//));
//
//print_r($response);

?>


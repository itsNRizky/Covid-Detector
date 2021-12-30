<?php

$url = "http://127.0.0.1:5000/predict";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Accept: application/json",
    "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);



$data = <<<DATA
{
    "Breathing Problem": 0,
    "Fever": 0,
    "Dry Cough": 0,
    "Sore throat": 0,
    "Running Nose": 0,
    "Asthma": 0,
    "Chronic Lung Disease": 1,
    "Headache": 0,
    "Heart Disease": 1,
    "Diabetes": 1,
    "Hyper Tension": 1,
    "Fatigue ": 0,
    "Gastrointestinal ": 0,
    "Abroad travel": 1,
    "Contact with COVID Patient": 1,
    "Attended Large Gathering": 1,
    "Visited Public Exposed Places": 0,
    "Family working in Public Exposed Places": 0,
    "Wearing Masks": 1,
    "Sanitization from Market": 0
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

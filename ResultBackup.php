<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Detector</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <nav id="mainNav" class="navbar navbar-expand-lg navbar-sticky navbar-dark">
            <div class="container">
                <h2>Covid Detector</h2>
                <?php
                // var_dump($_POST);
                // die();
                $Symptoms = [
                    "Breathing Problem",
                    "Fever",
                    "Dry Cough",
                    "Sore throat",
                    "Running Nose",
                    "Asthma",
                    "Chronic Lung Disease",
                    "Headache",
                    "Heart Disease",
                    "Diabetes",
                    "Hyper Tension",
                    "Fatigue ",
                    "Gastrointestinal ",
                    "Abroad travel",
                    "Contact with COVID Patient",
                    "Attended Large Gathering",
                    "Visited Public Exposed Places",
                    "Family working in Public Exposed Places",
                    "Wearing Masks",
                    "Sanitization from Market"
                ];
                for ($i = 0; $i <= 19; $i++) {
                    $Result[$i] = $_POST["J" . $i + 1];
                }
                // var_dump($Result);

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
    "Breathing Problem": $Result[0],
    "Fever": $Result[1],
    "Dry Cough": $Result[2],
    "Sore throat": $Result[3],
    "Running Nose": $Result[4],
    "Asthma": $Result[5],
    "Chronic Lung Disease": $Result[6],
    "Headache": $Result[7],
    "Heart Disease": $Result[8],
    "Diabetes": $Result[9],
    "Hyper Tension": $Result[10],
    "Fatigue ": $Result[11],
    "Gastrointestinal ": $Result[12],
    "Abroad travel": $Result[13],
    "Contact with COVID Patient": $Result[14],
    "Attended Large Gathering": $Result[15],
    "Visited Public Exposed Places": $Result[16],
    "Family working in Public Exposed Places": $Result[17],
    "Wearing Masks": $Result[18],
    "Sanitization from Market": $Result[19]
}
DATA;

                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

                //for debug only!
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                $resp = curl_exec($curl);
                curl_close($curl);
                // $decode = json_decode(($resp));
                // echo ($resp);

                $obj = json_decode($resp);
                // print $obj->{'Hasil'};
                ?>
            </div>
        </nav>
        <div class="hasil" style="height:80vh; display:flex; flex-direction:column ;justify-content:center; align-items:center">
            <?php
            if ($obj->{'Hasil'} ==  '1') {
                echo "<i style='color: red' class='fas fa-plus fa-4x'></i></i><h1 style='text-align:center;'>Anda Berkemungkinan Besar Positif Covid-19</h1>";
            } else if ($obj->{'Hasil'} ==  '0') {
                echo "<i style='color: green' class='fas fa-check fa-4x'></i><h1 style='text-align:center;'>Anda Berkemungkinan Besar Negatif Covid-19</h1>";
            } else {
                echo "<i style='color: green' class='fas fa-check fa-4x'></i><h1 style='text-align:center;'>Data Tidak Terkirim</h1>";
            }
            ?>
        </div>
        <p><a class="btn btn-primary" href='Covid-Detector.php'>Kembali</a></p>
    </div>


</body>

</html>
<?php


?>
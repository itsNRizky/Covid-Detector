<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Covid Detector | UAS Statistika</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon"> -->
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- <link href="assets/css/table.css" rel="stylesheet"> -->

    <!-- =======================================================
  * Template Name: Vesperr - v4.6.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="index.php">Covid Detector</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#form">Form</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>

                <!-- Symptomp -->
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
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <br>
    <br>
    <br>
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">
                        <?php
                        if ($obj->{'Hasil'} ==  '1') {
                            echo "<i style='color: red' class='fas fa-plus fa-4x'></i></i><h1 style='text-align:left;'>Anda Berkemungkinan Besar Positif Covid-19</h1>";
                        } else if ($obj->{'Hasil'} ==  '0') {
                            echo "<i style='color: green' class='fas fa-check fa-4x'></i><h1 style='text-align:left;'>Anda Berkemungkinan Besar Negatif Covid-19</h1>";
                        } else {
                            echo "<i style='color: green' class='fas fa-check fa-4x'></i><h1 style='text-align:left;'>Data Tidak Terkirim</h1>";
                        }
                        ?>
                    </h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Tetap jaga kesehatan, dan jalankan prokes</h2>
                    <!-- <div data-aos="fade-up" data-aos-delay="800">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div> -->
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                    <?php
                    if ($obj->{'Hasil'} ==  '1') {
                    ?>
                        <img src="assets/img/Positif.jpeg" class="img-fluid animated" alt="">
                    <?php
                    } else {
                    ?><img src="assets/img/Negatif.jpeg" class="img-fluid animated" alt="">
                    <?php }
                    ?>


                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">


        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 text-lg-left text-center">
                        <div class="copyright">
                            &copy; Copyright <strong>TIC</strong>. All Rights Reserved
                        </div>
                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
                            <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                            <a href="#intro" class="scrollto">Home</a>
                            <a href="#about" class="scrollto">About</a>
                            <a href="#">Privacy Policy</a>
                            <a href="#">Terms of Use</a>
                        </nav>
                    </div>
                </div>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/purecounter/purecounter.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

</body>

</html>
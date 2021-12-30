<?php
$Pertanyaan = [
    0,
    "Apakah Anda memiliki masalah pernafasan",
    "Apakah Anda mengalami demam",
    "Apakah Anda memiliki gejala batuk kering",
    "Apakah Anda sedang sakit tenggorokan",
    "Apakah Anda mengalami pilek",
    "Apakah Anda mengidap asma",
    "Apakah Anda mengidap penyakit paru-paru kronis",
    "Apakah Anda mengalami sakit kepala",
    "Apakah Anda mengidap penyakit jantung",
    "Apakah Anda mengidap diabetes",
    "Apakah Anda mengalami tekanan darah tinggi",
    "Apakah Anda merasa lelah",
    "Apakah Anda mengalami gangguan sistem pencernaan",
    "Apakah Anda melakukan perjalanan ke luar negeri akhir-akhir ini",
    "Apakah Anda melakukan kontak dengan pasien Covid-19",
    "Apakah Anda menghadiri pertemuan besar akhir-akhir ini",
    "Apakah Anda mengunjungi tempat publik",
    "Apakah Anda memiliki anggota keluarga yang bekerja di tempat publik",
    "Apakah Anda rajin menggunakan masker",
    "Apakah Anda menggunakan Handsanitizer"
];
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
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <nav id="mainNav" class="navbar navbar-expand-lg navbar-sticky navbar-dark">
            <div class="container">
                <h2>Covid Detector</h2>

            </div>
        </nav>
        <h5> Aplikasi screening Covid-19 dengan menjawab pertanyaan berikut. Isilah formulir berikut sesuai dengan data
            yang faktual untuk</h5>
        <!-- Form Covid Detector -->
        <form action="Result.php" method="POST">
            <!-- Pertanyaan -->
            <div class="row">
                <div class="col">
                    <?php
                    for ($i = 1; $i < 6; $i++) {
                        $P = "
                        <li class='list-group-item'>
                                <p>" . $Pertanyaan[$i] . "?</p>
                                <li class='list-group-item'>
                                    <input class='form-check-input' type='radio' name='J" . $i . "' id='T" . $i . "' required value=1>
                                    <label class='form-check-label' for='T" . $i . "'>Ya</label>
                                    <input class='form-check-input' type='radio' name='J" . $i . "' id='F" . $i . "' required value=0>
                                    <label class='form-check-label' for='F" . $i . "'>Tidak</label>
                                </li>
                            </li>
                        
                        ";
                        echo $P;
                    }
                    ?>
                </div>
                <div class="col">
                    <?php
                    for ($i = 6; $i < 11; $i++) {
                        $P = "
                        <li class='list-group-item' >
                                <p>" . $Pertanyaan[$i] . "?</p>
                                <li class='list-group-item'>
                                    <input class='form-check-input' type='radio' name='J" . $i . "' id='T" . $i . "' required value=1>
                                    <label class='form-check-label' for='T" . $i . "'>Ya</label>
                                    <input class='form-check-input' type='radio' name='J" . $i . "' id='F" . $i . "' required value=0>
                                    <label class='form-check-label' for='F" . $i . "'>Tidak</label>
                                </li>
                            </li>
                        
                        ";
                        echo $P;
                    }
                    ?>
                </div>
                <div class="col">
                    <?php
                    for ($i = 11; $i < 16; $i++) {
                        $P = "
                        <li class='list-group-item'>
                                <p>" . $Pertanyaan[$i] . "?</p>
                                <li class='list-group-item'>
                                    <input class='form-check-input' type='radio' name='J" . $i . "' id='T" . $i . "' required value=1>
                                    <label class='form-check-label' for='T" . $i . "'>Ya</label>
                                    <input class='form-check-input' type='radio' name='J" . $i . "' id='F" . $i . "' required value=0>
                                    <label class='form-check-label' for='F" . $i . "'>Tidak</label>
                                </li>
                            </li>
                        
                        ";
                        echo $P;
                    }
                    ?>
                </div>
                <div class="col">
                    <?php
                    for ($i = 16; $i < 21; $i++) {
                        $P = "
                        <li class='list-group-item'>
                                <p>" . $Pertanyaan[$i] . "?</p>
                                <li class='list-group-item'>
                                    <input class='form-check-input' type='radio' name='J" . $i . "' id='T" . $i . "' required value=1>
                                    <label class='form-check-label' for='T" . $i . "'>Ya</label>
                                    <input class='form-check-input' type='radio' name='J" . $i . "' id='F" . $i . "' required value=0>
                                    <label class='form-check-label' for='F" . $i . "'>Tidak</label>
                                </li>
                            </li>
                        
                        ";
                        echo $P;
                    }
                    ?>
                </div>
            </div>
            <center>
                <input type="submit" class="btn btn-primary">Submit</input>
            </center>
        </form>
    </div>
</body>

</html>
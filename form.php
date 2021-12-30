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
<form action="Result.php" method="POST">
    <?php
    for ($i = 1; $i < 21; $i++) {
        $P =  "
        <li class='list-group-item'>
                <p>" . $Pertanyaan[$i] . "?</p>
                <li class='list-group-item'>
                    <input class='form-check-input' id=" . $i . " onClick='' type='radio' name='J" . $i . "' id='T" . $i . "' required value=1>
                    <label class='form-check-label' for='T" . $i . "'>Ya</label>
                    <input class='form-check-input' type='radio' name='J" . $i . "' id='F" . $i . "' required value=0>
                    <label class='form-check-label' for='F" . $i . "'>Tidak</label>
                </li>
            </li>
            <br>

        
        ";
        echo $P;
    }
    ?>
    <center>
        <input type="submit" class="btn btn-primary px-5">
    </center>
</form>
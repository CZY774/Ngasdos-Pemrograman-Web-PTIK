<?php
    /* CARA MEMBUAT ARRAY */
    
    //  MODE 1
    // $array = array();
    $mahasiswa = array("Reva", "Asep", "Sutopo", "Wowo");

    //  MODE 2
    // $array = [];
    $mahasiswa = ["Reva", "Asep", "Sutopo", "Wowo"];
    // indeks ke    0       1       2        3

    //  MODE 3
    // $array[indeks] = value;
    $mahasiswa[0] = "Reva";
    $mahasiswa[1] = "Asep";
    $mahasiswa[2] = "Sutopo";
    $mahasiswa[3] = "Wowo";
    $mahasiswa[4] = "";

    // CARA MENAMPILKAN ARRAY
    //  MODE 1
    echo "Mode 1 <br>";
    echo $mahasiswa[4] . "<br><br>";
    
    //  MODE 2
    echo "Mode 2 <br>";
    for ($i = 0; $i < count($mahasiswa); $i++) {
        echo $mahasiswa[$i] . "<br>";
    }
    echo "<br>";

    //  MODE 3
    echo "Mode 3 <br>";
    foreach ($mahasiswa as $mhs) {
        echo $mhs . "<br>";
    }
    echo "<br>";
?>
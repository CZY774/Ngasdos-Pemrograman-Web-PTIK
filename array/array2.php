<?php
    /* CARA MEMBUAT ARRAY */
    
    //  MODE 1
    $mahasiswa = array(
        array("Reva", "Asep", "Sutopo", "Wowo"),
        array("Fafa", "Rey", "Mulyono", "Sumanto"),
        array("Suwartono", "Pitono", "Sukirno", "Suprapto"),
    );

    // MODE 2
    $mahasiswa = [
        ["Reva", "Asep", "Sutopo", "Wowo"],
        ["Fafa", "Rey", "Mulyono", "Sumanto"],
        ["Suwartono", "Pitono", "Sukirno", "Suprapto"],
    ];

    // MODE 3
    $mahasiswa[0][0] = "Reva";
    $mahasiswa[0][1] = "Asep";
    $mahasiswa[0][2] = "Sutopo";
    $mahasiswa[0][3] = "Wowo";
    $mahasiswa[1][0] = "Fafa";
    $mahasiswa[1][1] = "Rey";
    $mahasiswa[1][2] = "Mulyono";
    $mahasiswa[1][3] = "Sumanto";
    $mahasiswa[2][0] = "Suwartono";
    $mahasiswa[2][1] = "Pitono";
    $mahasiswa[2][2] = "Sukirno";
    $mahasiswa[2][3] = "Suprapto";

    /* CARA MENAMPILKAN ARRAY */
    //  MODE 1
    echo "Mode 1 <br>";
    echo $mahasiswa[0][0] . "<br>";
    echo $mahasiswa[1][0] . "<br>";
    echo $mahasiswa[2][1] . "<br>";
    echo "<br>";

    //  MODE 2
    echo "Mode 2 <br>";
    for ($i = 0; $i < count($mahasiswa); $i++) {
        for ($j = 0; $j < count($mahasiswa[$i]); $j++) {
            echo $mahasiswa[$i][$j] . "<br>";
        }
    }
    echo "<br>";

    // MODE 3
    echo "Mode 3 <br>";
    foreach ($mahasiswa as $mhs) {
        foreach ($mhs as $mhs2) {
            echo $mhs2 . "<br>";
        }
    }
?>
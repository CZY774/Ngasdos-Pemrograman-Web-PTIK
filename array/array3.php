<table border="1">
    <?php
        $matakuliah = [
            ["kode" => "TC001",
            "nama" => "Menyanyi",
            "sks" => 4],

            ["kode" => "TC002",
            "nama" => "Pengantar Teknologi Layangan",
            "sks" => 4],

            ["kode" => "TC003",
            "nama" => "Dasar-Dasar Layangan",
            "sks" => 5]
        ];

        // UNBOXING
        foreach ($matakuliah as $mk) {
            echo $mk["kode"] . " - " . $mk["nama"] . " - " . $mk["sks"] . "<br>";
        }
        
        echo "<br><br>";
        // buat foreach seperti diatas, namun dalam bentuk table
        echo "<tr align='center'>";
        echo "<td>" . "Kode Matakuliah" . "</td>";
        echo "<td>" . "Nama Matakuliah" . "</td>";
        echo "<td>" . "Jumlah SKS" . "</td>";
        echo "</tr>";
        foreach ($matakuliah as $mk) {
            echo "<tr align='center'>";
            echo "<td>" . $mk["kode"] . "</td>";
            echo "<td>" . $mk["nama"] . "</td>";
            echo "<td>" . $mk["sks"] . "</td>";
            echo "</tr>";
        }
    ?>
</table>

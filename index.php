<?php
    set_time_limit(10000);

    for ($i = 0; $i < 500000; $i++) {
        $codigo = claveThree();
        if (
            strpos($codigo, '0o') !== false || strpos($codigo, 'o0') !== false ||
            strpos($codigo, 'il') !== false || strpos($codigo, 'll') !== false ||
            strpos($codigo, 'ii') !== false || strpos($codigo, 'Ii') !== false ||
            strpos($codigo, '1i') !== false || strpos($codigo, 'i1') !== false ||
            strpos($codigo, 'Oo') !== false ||  strpos($codigo, 'oO') !== false ||
            strpos($codigo, 'OO') !== false || strpos($codigo, 'I1') !== false ||
            strpos($codigo, 'O0') !== false || strpos($codigo, '0O') !== false ||
            strpos($codigo, 'IL') !== false || strpos($codigo, 'LL') !== false ||
            strpos($codigo, '1I') !== false || strpos($codigo, 'oo') !== false ||
            strpos($codigo, 'iL') !== false || strpos($codigo, 'iL') !== false ||
            strpos($codigo, 'Il') !== false || strpos($codigo, 'Li') !== false ||
            strpos($codigo, 'li') !== false || strpos($codigo, 'lI') !== false ||
            strpos($codigo, 'LI') !== false || strpos($codigo, '1L') !== false ||
            strpos($codigo, '1l') !== false || strpos($codigo, 'l1') !== false ||
            strpos($codigo, '1l') !== false || strpos($codigo, 'l1') !== false ||
            strpos($codigo, 'L1') !== false) {
        } else {
            // echo "$i: ".$codigo;
            insert($codigo);
        }
        $codigo = '';
    }

    echo "Registros almacenados: $i";

    /*
    * Clave aleatoria
    */
    function claveThree($length = 12) { 
        return substr(str_shuffle("1a2b3c4d5e6f7g8h9i"), 0, $length); 
    }

    function insert ($codigo){ 
        try {
            require "conecction.php";
            $sql = "INSERT IGNORE INTO codigos (cod) VALUES ('".$codigo."')";
            // use exec() because no results are returned
            $conn->exec($sql);
            // echo "New record created successfully <br>";
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
?>
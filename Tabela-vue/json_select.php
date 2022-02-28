<?php
        header('Access-Control-Allow-Origin: *');
        include "polacz.php"; 
        if ($sql = $baza->prepare( "SELECT DISTINCT imie, pesel, nazwisko, klasa FROM uczniowie ORDER BY imie "))
        {
                $sql->execute(); 
                $sql->bind_result($imie,$pesel,$nazwisko,$klasa);
                while ($sql->fetch())
                  $nazwiska[] = array(
                     "pesel" => $pesel,
                     "first_name" => $imie,
                     "last_name" => $nazwisko,
                     "klasa" => $klasa
                   ); 
                $sql->close();
        }
        $baza->close();
        echo json_encode($nazwiska, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>
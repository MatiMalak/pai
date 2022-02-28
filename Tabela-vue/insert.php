<?php
include "polacz.php";
$imie = wczytaj("imie");
$nazwisko = wczytaj("nazwisko");
$klasa = wczytaj("klasa");
$pesel = wczytaj("pesel");

$sql = $baza->prepare("INSERT INTO uczniowie VALUES (?, ?, ?, ?);");
if ($sql)
{
        $sql->bind_param("ssss", $imie, $nazwisko, $klasa, $pesel);
        $sql->execute();
        $sql->close();
}
else
    die( 'Błąd: '. $baza->error);
$baza->close();
header ("Location: ucznie.php");
?>
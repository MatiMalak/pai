<html>
 <head>
  <meta charset="utf-8">
  <title>Panel admina</title>
 </head>
 <body>
 <h1>Panel Administratora</h1>
  <table border="3">
   <tr>
     <th>Imie</th><th>Nawisko</th><th>Klasa</th><th>Pesel</th>
   </tr>
<?php
include "../polacz.php";
if ($sql =  $baza->prepare("SELECT * FROM uczniowie ORDER BY imie, nazwisko"))
{
        $sql->execute();
        $sql->bind_result($imie, $nazwisko, $klasa, $pesel);
        while ($sql->fetch())
        {
                echo "<tr>
                        <td>$imie</td>
                        <td>$nazwisko</td>
                        <td>$klasa</td>
                        <td>$pesel</td>
                   </tr>";
        }
        $sql->close();
 }
else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin: ". $baza->error );

 $baza->close();
?>
  </table>
  <a href="dodaj.php">Dodawanie nowego</a>
  <a href="../samohody.php">Wroc do samochodow</a>
 </bod
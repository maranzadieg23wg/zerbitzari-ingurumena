<?php

$matriz = array(
    array("Sweet Little Sister", "Skid Row", "Skid Row"),
    array("Symphony Of Destruction", "Countdown to Extinction", "Megadeth"),
    array("The Beautiful People", "Antichrist Superstar", "Marilyn Manson"),
    array("Tainted Love", "Not Another Teen Movie", "Marilyn Manson")
);

imp($matriz);

function imp($matriz) {
    echo("<table border='2'>");
    echo("<tr>");
    echo("<th>Abestia</th>");
    echo("<th>Albuma</th>");
    echo("<th>Taldea</th>");
    echo("</tr>"); 
    $fila = count($matriz);
    $kol = count($matriz[0]);

    for ($i = 0; $i < $fila; $i++) {
        echo("<tr>");
        for ($e = 0; $e < $kol; $e++) {
            echo("<td>" . $matriz[$i][$e] . "</td>"); 
        }
        echo("</tr>"); 
    }

    echo("</table>"); 
}

?>

<?php

function numeroSecreto() {
    $numDisponibles = range(0, 9);
    shuffle($numDisponibles);
    return array_slice($numDisponibles, 0, 4);
}


function verificarJugada($numSecreto, $numUser) {
    $picas = 0;
    $fijas = 0;

    for($i = 0; $i < 4; $i++) {
        if($numSecreto[$i] == $numUser[$i]) {
            $fijas++;
        } else if(in_array($numUser[$i], $numSecreto)) {
            $picas++;
        }
    }

    return array($picas, $fijas);
}

function juego()  {
    $numeroSecreto = numeroSecreto();
    $intentos = 0;

    echo "Bienvenido al Juego de picas y fijas \n";

    do {
        $intentos++;
        $numeroUser = readline("Intento Numero: $intentos \n");

        if(!ctype_digit($numeroUser) || strlen($numeroUser) != 4) {
            echo "Ingrese un numero de 4 Dijitos!! \n";
            continue;
        }

        $numeroUser = str_split($numeroUser);
        $result = verificarJugada($numeroSecreto, $numeroUser);

        echo "Picas: $result[0] \n";
        echo "Fijas: $result[1] \n";
    } while ($result[1] != 4);

    echo "Felicitaciones, adivinaste el numero secreto con $intentos intentos \n";
}

juego();
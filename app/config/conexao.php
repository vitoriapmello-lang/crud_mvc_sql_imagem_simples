<?php

function conectar() {

    $con = mysqli_connect("localhost", "root", "px780712601", "bd_loja_mvc", 3307);

    /*
    testar conexão
    if (!$con) {
        die("Conexão falhou: " . mysqli_connect_error());
    }
    */
    return $con;
}

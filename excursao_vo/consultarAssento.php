<?php

function ConsultarAsssento(){

    $conexao = new PDO ("mysql:host=localhost; dbname=escursao_vo", "root", "");
    $query = "SELECT ID, nome, cpf, numero, banco FROM reserva";

    $resultado = $conexao->query($query);
    $consulta = $resultado->fetchAll();

    return $consulta;
}

// function Consultar1Assento(){
//     $conexao = new PDO ("mysql:host=localhost; dbname=escursao_vo", "root", "");

//     $query = "SELECT ID, nome, cpf, numero FROM reserva WHERE id = " ;
//     $resultado = $conexao->query($query);
//     $consulta = $resultado->fetchAll();

//     foreach($consulta as $consulta){
//         return $consulta;
//     }

// }
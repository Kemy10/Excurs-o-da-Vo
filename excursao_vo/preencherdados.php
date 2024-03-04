<?php

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$numero = $_POST['telefone'];
$banco = $_POST['banco'];

function ReservaAssento($nome, $cpf, $numero, $banco )
{

    $conexao = new PDO("mysql:host=localhost;dbname=escursao_vo", "root", "");
    $query = "INSERT INTO 
                reserva (nome,  cpf,numero, banco)
              VALUE
                ('" . $nome . "','" . $cpf . "','" . $numero . "','" . $banco . "')";
    $conexao->exec($query);
   

    
}


ReservaAssento($nome, $cpf, $numero, $banco);
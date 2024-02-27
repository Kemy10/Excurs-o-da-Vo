<?php

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];

function ReservaAssento($nome, $cpf, $telefone )
{

    $conexao = new PDO("mysql:host=localhost;dbname=excursao_vo", "root", "");
    $query = "INSERT INTO 
                reserva (nome, telefone, cpf)
              VALUE
                ('" . $nome . "','" . $cpf . "','" . $telefone . "')";
    $conexao->exec($query);


    if ($conexao->query($query) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: ";
    }
    
    
}


ReservaAssento($nome, $cpf, $telefone);
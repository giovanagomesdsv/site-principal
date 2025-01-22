<?php 
$hostname = "localhost";
$banco = "bc";
$user = "root";
$senha = "";

$conexao = new mysqli($hostname, $user, $senha, $banco);

if ($conexao->connect_errno) {
    echo "Falha ao se conectar: ". $conexao->connect_errno." ->". $conexao->connect_error;
} 
?>
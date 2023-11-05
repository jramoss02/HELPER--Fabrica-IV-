<?php
// Autor: José Ramos
// Versão: 1.03

// Configurações de conexão com o banco de dados
$host = "localhost";   // Endereço do servidor do banco de dados
$usuario = "root";     // Nome de usuário do banco de dados
$senha = "123456";     // Senha do banco de dados
$banco = "HELPER";     // Nome do banco de dados

// Estabelece a conexão com o banco de dados
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
?>

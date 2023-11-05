<?php
// Autor: José Ramos
// Versão: 1.03

// Inclui o arquivo de conexão com o banco de dados
include("conn.php");

// Recupera os dados do formulário via método POST
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

// Realiza o hash da senha usando o algoritmo Bcrypt
$senhaHash = password_hash($senha, PASSWORD_BCRYPT);

// Monta a consulta SQL para inserir os dados no banco de dados
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senhaHash')";

// Executa a consulta SQL e verifica se a operação foi bem-sucedida
if ($conn->query($sql) === TRUE) {
    $response = array('success' => true, 'message' => 'Cadastro realizado com sucesso!');
} else {
    $response = array('success' => false, 'message' => 'Erro ao cadastrar: ' . $conn->error);
}

// Fecha a conexão com o banco de dados
$conn->close();

// Define o cabeçalho da resposta como JSON
header('Content-Type: application/json');

// Envia a resposta em formato JSON
echo json_encode($response);
?>

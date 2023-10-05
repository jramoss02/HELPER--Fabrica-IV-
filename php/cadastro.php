<?php
include("conn.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$senhaHash = password_hash($senha, PASSWORD_BCRYPT);

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senhaHash')";

if ($conn->query($sql) === TRUE) {
    $response = array('success' => true, 'message' => 'Cadastro realizado com sucesso!');
} else {
    $response = array('success' => false, 'message' => 'Erro ao cadastrar: ' . $conn->error);
}

$conn->close();

// Enviar a resposta em JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

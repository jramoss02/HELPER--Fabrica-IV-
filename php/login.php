<?php
// Autor: José Ramos   
// Versão: 1.03

// Inclui o arquivo de conexão com o banco de dados
include("conn.php");

// Recupera os valores do formulário
$email = $_POST["email"];
$senha = $_POST["senha"];

// Consulta ao banco de dados para verificar as credenciais
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verifica se a senha fornecida corresponde à senha armazenada no banco (usando password_verify)
    if (password_verify($senha, $row["senha"])) {
        // Credenciais válidas, redireciona para a página desejada
        header("Location: http://localhost/helper/home.html");
    } else {
        // Senha incorreta
        $response = array('success' => false, 'message' => 'Senha incorreta.');
    }
} else {
    // Email não encontrado
    $response = array('success' => false, 'message' => 'Email não encontrado.');
}

// Fecha a conexão com o banco de dados
$conn->close();

// Enviar a resposta em JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

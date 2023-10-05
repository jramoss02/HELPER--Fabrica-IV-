<?php
include("conn.php");

$email = $_POST["email"];
$senha = $_POST["senha"];

// Consulta ao banco de dados para verificar as credenciais
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row["senha"])) {
        // Credenciais válidas, redirecionar para a página desejada
        header("Location: http://localhost/helper/home.html");

    } else {
        $response = array('success' => false, 'message' => 'Senha incorreta.');
    }
} else {
    $response = array('success' => false, 'message' => 'Email não encontrado.');
}

$conn->close();

// Enviar a resposta em JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

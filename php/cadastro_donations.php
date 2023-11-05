# Autor: José Ramos
# Versão: 1.03

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Metadados da página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Título da página -->
    <title>HELPER</title>
</head>
<body>
<?php
    // Inclui o arquivo de conexão com o banco de dados
    include 'conn.php';

    // Verifica se a requisição é um POST (submissão do formulário)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recupera os dados do formulário
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];
        $endereco = $_POST['endereco'];
        $detalhes = $_POST['detalhes']; // Corrigido de 'categoria' para 'detalhes'
        $estado = $_POST['estado'];
        
        // Verifica a categoria para definir a meta
        if ($categoria === 'dinheiro') {
            $meta = $_POST['meta'];
        } else {
            $meta = null;
        }

        // Recupera a imagem enviada no formulário
        $imagem_temp = $_FILES['imagem']['tmp_name'];
        $imagem_binaria = file_get_contents($imagem_temp);

        // Prepara a consulta SQL para inserir dados no banco de dados
        $sql = "INSERT INTO doacoes (nome, descricao, meta, estado, categoria, imagem, endereco, detalhes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssdsss', $nome, $descricao, $meta, $estado, $categoria, $imagem_binaria, $endereco, $detalhes);
        
        // Executa a consulta e exibe uma mensagem com base no resultado
        if ($stmt->execute()) {
            echo '<p>Doação cadastrada com sucesso!</p>';
        } else {
            echo '<p>Erro ao cadastrar a doação: ' . $stmt->error . '</p>';
        }

        $stmt->close();
    }
?>
<!-- Cabeçalho da página -->
<nav>
    <div class="nav-wrapper">
      <a href="../home.html" class="brand-logo">
        <img src="../imgs/logo-branca.png" alt="">
      </a>
      <div class="navbar-links">
        <a href="./donations.php">Doações abertas</a>
        <a href="./cadastro_donations.php">Criar doações</a>
      </div>
    </div>
</nav>

<!-- Formulário de cadastro de doações -->
<div class="cadastro-doacoes">
    <div class="title-cadastro">
        <h1>Cadastro de Doações</h1>
        <p>Insira as informações e necessidades da sua doação!</p>
    </div>
    
    <!-- Início do formulário com campos para inserção de dados -->
    <form method="POST" enctype="multipart/form-data">
        <!-- Campos para inserção de dados -->
        <!-- Labels e inputs -->
        
        <!-- Script JavaScript para mostrar/ocultar campo de meta com base na categoria -->
        
        <!-- Botão de submissão do formulário -->
    </form>
</div>
<!-- Fechamento da conexão com o banco de dados -->
<?php
$conn->close();
?>
</body>

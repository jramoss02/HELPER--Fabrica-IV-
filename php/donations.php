<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <title>HELPER</title>
</head>
<body>

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

<div class="donations-page">
    <div class="donations-wrapper">
        
    <h1>Catalogo de Doações</h1>
        <form method="GET">
            <input class="search" type="text" name="pesquisa" placeholder="Pesquisar por nome">
            <label for="estado">Filtrar por Estado:</label>
                <select name="estado">
                <option value="">Todos</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>

            <label for="categoria">Filtrar por Categoria:</label>
            <select name="categoria">
                <option value="">Todas</option>
                <option value="dinheiro">Dinheiro</option>
                <option value="roupas">Roupas</option>
                <option value="comida">Comida</option>
            </select>

            <input class="submit-search" type="submit" value="Filtrar">
        </form>
    </div>



<?php
// Inclua o arquivo de conexão com o banco de dados
include 'conn.php';

// Construa a consulta SQL com base nos filtros
$sql = "SELECT * FROM doacoes WHERE 1=1";

if (!empty($_GET['estado'])) {
    $estado = $_GET['estado'];
    $sql .= " AND estado = '$estado'";
}

if (!empty($_GET['categoria'])) {
    $categoria = $_GET['categoria'];
    $sql .= " AND categoria = '$categoria'";
}

if (!empty($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $sql .= " AND nome LIKE '%$pesquisa%'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="doacoes-grid">';
    
    while ($row = $result->fetch_assoc()) {
        echo '<div class="doacao" id="doacao_' . $row['id'] . '">';
        echo '<h2 class="titulo-doacao">' . $row['nome'] . '<span>' . $row['estado'] . '</span>' . '</h2>';
        
        echo '<div class="infos">';
            echo '<p class="categoria-doacao">Categoria: ' . $row['categoria'] . '</p>';
            if ($row['categoria'] === 'dinheiro') {
                echo '<p class="meta-doacao">Meta: R$ ' . $row['meta'] . '</p>';
            }
        echo '</div>';

        echo '<p class="descricao-doacao">' . $row['descricao'] . '</p>';
        echo '<img class="imagem-doacao" src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="Imagem da Doação">';
        echo '</div>';
    }
    
    echo '</div>';
} else {
    echo 'Nenhuma doação encontrada.';
}


// Feche a conexão com o banco de dados
$conn->close();
?>
</div>
</body>
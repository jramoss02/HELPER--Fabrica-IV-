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

<?php
    include 'conn.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];
        $endereco = $_POST['endereco'];
        $categoria = $_POST['detalhes'];
        $estado = $_POST['estado'];
        
        if ($categoria === 'dinheiro') {
            $meta = $_POST['meta'];
        } else {
            $meta = null;
        }

        $imagem_temp = $_FILES['imagem']['tmp_name'];
        $imagem_binaria = file_get_contents($imagem_temp);

        $sql = "INSERT INTO doacoes (nome, descricao, meta, estado, categoria, imagem, endereco, detalhes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssdsss', $nome, $descricao, $meta, $estado, $categoria, $imagem_binaria, $endereco, $detalhes);
        
        if ($stmt->execute()) {
            echo '<p>Doação cadastrada com sucesso!</p>';
        } else {
            echo '<p>Erro ao cadastrar a doação: ' . $stmt->error . '</p>';
        }

        $stmt->close();
    }
?>

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

<div class="cadastro-doacoes">

    <div class="title-cadastro">
        <h1>Cadastro de Doações</h1>
        <p>Insira as informações e necessidades da sua doação!</p>
    </div>

    <form method="POST" enctype="multipart/form-data">
        <label for="nome">Titulo:</label>
        <input type="text" name="nome" required><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" required></textarea><br>

        <label for="detalhes">Detalhes:</label>
        <textarea name="detalhes" required></textarea><br>

        <label for="endereco">Endereço para envio das doações:</label>
        <textarea name="detalhes" required></textarea><br>

        <label for="categoria">Categoria:</label>
        <select name="categoria" required>
            <option value="dinheiro">Dinheiro</option>
            <option value="roupas">Roupas</option>
            <option value="comida">Comida</option>
        </select><br>

        <div id="meta-field" style="display:none;">
            <label for="meta">Meta (R$):</label>
            <input type="number" name="meta"><br>
        </div>

        <label for="estado">Estado:</label>
            <select name="estado" required>
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

        </select><br>

        <label for="imagem">Imagem:</label>
        <input type="file" name="imagem" required><br>

        <script>
            function toggleMetaField() {
                var categoria = document.querySelector('select[name="categoria"]').value;
                var metaField = document.getElementById('meta-field');

                if (categoria === 'dinheiro') {
                    metaField.style.display = 'block';
                } else {
                    metaField.style.display = 'none';
                }
            }

            document.querySelector('select[name="categoria"]').addEventListener('change', toggleMetaField);
            toggleMetaField();
        </script>

        <input type="submit" value="Cadastrar">
    </form>
</div>

    <?php
    $conn->close();
    ?>
</body>
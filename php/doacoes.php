<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];
    
    // Incluir o arquivo de conexão com o banco de dados
    include("conn.php");

    // Upload da imagem
    $nomeImagem = null;
    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] === UPLOAD_ERR_OK) {
        $nomeOriginal = $_FILES["imagem"]["name"];
        $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
        $nomeImagem = uniqid() . '.' . $extensao;
        $caminhoDestino = "caminho/para/o/seu/diretorio/upload/" . $nomeImagem;
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoDestino);
    }

    // Inserir o serviço no banco de dados (conexão já está incluída)
    $sql = "INSERT INTO servicos (nome, descricao, preco, categoria, imagem) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssdss", $nome, $descricao, $preco, $categoria, $nomeImagem);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar o serviço: " . $stmt->error;
    }

    // Fechar a conexão
    $stmt->close();
    $conexao->close();
}
?>



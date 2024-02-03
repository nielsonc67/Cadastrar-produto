<?php
// Conectar ao banco de dados (substitua as credenciais conforme necessário)
$servername = "localhost";
$username = "seu_nome_de_usuario";
$password = "sua_senha";
$dbname = "nome_do_banco_de_dados";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Pegar os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Preparar e executar a consulta SQL para inserir os dados do usuário
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

if ($conn->query($sql) === TRUE) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o usuário: " . $conn->error;
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
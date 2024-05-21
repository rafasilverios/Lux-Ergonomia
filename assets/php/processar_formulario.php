<?php
$host = "myshared0022";
$usuario = "luxergonomia";
$senha = "R@fael1102moni";
$banco = "luxergonomia";

$conexao = mysqli_connect($host, $usuario, $senha, $banco);
if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

$companyName = $_POST['company'];
$applicantName = $_POST['applicant'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$message = $_POST['message'];

$stmt = mysqli_prepare($conexao, "INSERT INTO orcamento (company, applicant, email, telefone, message) VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sssss", $companyName, $applicantName, $email, $telefone, $message);

if (mysqli_stmt_execute($stmt)) {
    $lastInsertId = mysqli_insert_id($conexao);
    echo "Dados do formulário foram armazenados no banco de dados com sucesso. ID: " . $lastInsertId;
} else {
    echo "Erro ao armazenar os dados do formulário: " . mysqli_error($conexao);
}

mysqli_stmt_close($stmt);

?>
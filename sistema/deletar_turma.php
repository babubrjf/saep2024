<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar turma</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="icon" href="logo.png">
    <style>
        .navbar-custom {
            background-color: #2D5F8B;
        }
    </style>
</head>
<body style="background-color: whitesmoke">

<?php
session_start();
include 'config.php';

if (!isset($_SESSION['professor_id'])) {
    header("Location: login.php");
    exit();
}

$turma_id = $_GET['turma_id'];

$sql = "SELECT * FROM atividades WHERE turma_codigo='$turma_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: erro.php");    
} else {
    $sql = "DELETE FROM turmas WHERE codigo='$turma_id'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: listar_turmas.php");
    } else {
        echo "Erro ao deletar turma: " . $conn->error;
    }
}
?>
<div class="row">
    <div class="col-12 d-flex justify-content-center">
    <a href="listar_turmas.php" class="btn btn-primary mb-2">Voltar</a>
</div>

</body>
</html>
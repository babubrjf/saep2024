<?php
session_start();
if (!isset($_SESSION['professor_id'])) {
    header("Location: login.php");
    exit();
}

$professor_nome = $_SESSION['professor_nome'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="icon" href="logo.png">
    <style>
        .navbar-custom {
            background-color: #2D5F8B;
        }
    </style>
</head>
<body style="background-color: whitesmoke">

<script src="js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <nav class="navbar navbar-custom">
        <div class="container-fluid">
        <a href="listar_turmas.php" style="text-decoration:none"><span class="navbar-brand mb-0 h1 text-white">Bem-vindo(a), Professor(a) <?php echo $professor_nome; ?></span></a>
        <a href="logout.php" onclick="return confirm('Deseja deslogar do sistema?')" class="btn btn-danger">Sair</a>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">VOCÊ NÃO PODE EXCLUIR UMA TURMA COM ATIVIDADES CADASTRADAS!</div>
                </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
            <a href="listar_turmas.php" class="btn btn-primary mb-2">Voltar</a>
            </div>
        </div>
    </div>
</body>
</html>
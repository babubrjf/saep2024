<?php
session_start();
include 'config.php';

if (!isset($_SESSION['professor_id'])) {
    header("Location: login.php");
    exit();
}

$professor_id = $_SESSION['professor_id'];

$sql_professor = "SELECT nome FROM professores WHERE codigo='$professor_id'";
$result_professor = $conn->query($sql_professor);
$professor_nome = $result_professor->fetch_assoc()['nome'];

$turma_id = $_GET['turma_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO atividades (descricao, turma_codigo) VALUES ('$descricao', '$turma_id')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: sucesso.php");
    } else {
        echo "Erro ao cadastrar atividade: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar atividade</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="icon" href="logo.png">
    <style>
        .navbar-custom {
            background-color: #2D5F8B;
        }
    </style>
</head>
<body style="background-color: whitesmoke">
    
    <nav class="navbar navbar-custom">
        <div class="container-fluid">
        <a href="listar_turmas.php" style="text-decoration:none"><span class="navbar-brand mb-0 h1 text-white">Bem-vindo(a), Professor(a) <?php echo $professor_nome; ?></span></a>
        <a href="logout.php" onclick="return confirm('Deseja deslogar do sistema?')" class="btn btn-danger">Sair</a>
        </div>
    </nav>
    <div class="container mt-5">
        <h3>Cadastrar atividade</h3>
        <div class="row justify-content-end">
            <div class="col-2">            
            <a href="listar_turmas.php" class="btn btn-primary mt-2">Voltar</a>
            </div>
        </div>
        <form method="post" action="cadastrar_atividade.php?turma_id=<?php echo $turma_id; ?>">
            <div class="mb-3">
                <label for="descricao" class="form-label">Prescrição</label>
                <textarea name="descricao" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
        
    </div>
</body>
</html>
<?php
session_start();
include 'config.php';

if (!isset($_SESSION['professor_id'])) {
    header("Location: login.php");
    exit();
}

$turma_id = $_GET['turma_id'];
$professor_id = $_SESSION['professor_id'];

// Obter nome do turma
$sql_turma = "SELECT nome FROM turmas WHERE codigo='$turma_id'";
$result_turma = $conn->query($sql_turma);
$turma_nome = $result_turma->fetch_assoc()['nome'];

// Obter nome do professor
$sql_professor = "SELECT nome FROM professores WHERE codigo='$professor_id'";
$result_professor = $conn->query($sql_professor);
$professor_nome = $result_professor->fetch_assoc()['nome'];

// Obter descrições
$sql = "SELECT * FROM atividades WHERE turma_codigo='$turma_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listar atividades</title>
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
        <h4>Visualizando: <?php echo $turma_nome; ?></h4>
        <div class="row justify-content-end">
            <div class="col-3">
            <a href="cadastrar_atividade.php?turma_id=<?php echo $turma_id; ?>" class="btn btn-success mb-2">Cadastrar atividade</a>
            </div>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['codigo']."</td>";
                        echo "<td>".$row['descricao']."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Nenhuma atividade cadastrada</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
    </div>
</body>
</html>
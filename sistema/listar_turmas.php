<?php
session_start();
include 'config.php';

if (!isset($_SESSION['professor_id'])) {
    header("Location: login.php");
    exit();
}

//define o nome da sessão pelo id do médico
$professor_id = $_SESSION['professor_id'];

//recupera o nome do médico de acordo com o id da sessão
$sql_professor = "SELECT nome FROM professores WHERE codigo='$professor_id'";
$result_professor = $conn->query($sql_professor);
$professor_nome = $result_professor->fetch_assoc()['nome'];

$sql = "SELECT * FROM turmas WHERE professor_codigo='$professor_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Minhas Turmas</title>
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
        <h4>Turmas</h4>
        <div class="row justify-content-end">
            <div class="col-2">            
            <a href="cadastrar_turma.php" class="btn btn-success mb-2">Cadastrar Turma</a>
            </div>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['codigo']."</td>";
                        echo "<td>".$row['nome']."</td>";
                        echo "<td><a href='listar_atividades.php?turma_id=".$row['codigo']."' class='btn btn-info btn-sm'>Visualizar</a> ";
                        echo "<a href='deletar_turma.php?turma_id=".$row['codigo']."' onClick='return confirm(\"Deseja deletar a turma selecionada?\")' class='btn btn-danger btn-sm'>Deletar</a></td>"; 
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum turma cadastrado</td></tr>";
                }
                ?>
            </tbody>
        </table>        
    </div>
</body>
</html>
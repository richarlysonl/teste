<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <title>Document</title>
</head>

<body>
    <a href="cadastro/cadastrar.php"><button name="cadastrar">cadastrar</button></a>
    <?php
    include "Conexao.php";
    // Verifica se a tabela "usuario" já existe
    $tabela_usuario = mysqli_query($conexao, "SHOW TABLES LIKE 'usuario'");
    $tabela_tarefa = mysqli_query($conexao, "SHOW TABLES LIKE 'tarefa'");

    // Se as tabelas não existirem, cria tudo
    if (mysqli_num_rows($tabela_usuario) == 0 || mysqli_num_rows($tabela_tarefa) == 0){
        header("Location: setup.php");
    }
        session_start();
    if (isset($_SESSION['userUsuario'])) {
        echo "<a href='exibir.php'><button name='exibir'>exibir</button></a>";
        echo "<a href='login/validarLogout.php'><button name='sair'>sair</button></a>";
    } else {
        echo "<a href='login/logar.php'><button name='logar'>logar</button></a>";
    }
    ?>

    </script>
</body>

</html>
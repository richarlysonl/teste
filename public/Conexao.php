<?php
use Pdo\Pgsql;  
$host = "dpg-d0ie95euk2gs73apq9k0-a";
$port = "5432";
$dbname = "gerenciador_de_tarefas_vrkk";
$user = "root";
$password = "p2POewNKNUP8fdk9U1fZdLvmxomt22rp";
$conexao = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");    
if (!$conexao) {
    die("Erro na conexão: " . pg_last_error());
}
// ✅ Função que verifica se uma tabela existe
function tabela_existe($conexao, $nome_tabela) {
    $resultado = pg_query_params($conexao,
        "SELECT EXISTS (
            SELECT 1 FROM information_schema.tables 
            WHERE table_schema = 'public' AND table_name = $1
        )", array($nome_tabela));

    if ($resultado) {
        $linha = pg_fetch_assoc($resultado);
        return $linha['exists'] === 't';
    }
    return false;
}

// ✅ Verificações automáticas
if (!tabela_existe($conexao, 'usuario')) {
    pg_query($conexao, "
        CREATE TABLE usuario (
            codigo SERIAL PRIMARY KEY,
            email VARCHAR(50) NOT NULL,
            nome VARCHAR(50) NOT NULL,
            senha VARCHAR(255) NOT NULL
        );
    ");
}

if (!tabela_existe($conexao, 'tarefa')) {
    pg_query($conexao, "
        CREATE TABLE tarefa (
            codigo SERIAL PRIMARY KEY,
            titulo VARCHAR(50),
            usuario_id INT REFERENCES usuario(codigo),
            descricao VARCHAR(100) NOT NULL,
            concluida BOOLEAN DEFAULT FALSE
        );
    ");
}
?>
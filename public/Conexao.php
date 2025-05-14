<?php
$host="dpg-d0ie95euk2gs73apq9k0-a";
$user="root";
$pass="p2POewNKNUP8fdk9U1fZdLvmxomt22rp";
$banco="gerenciador_de_tarefas_vrkk";
$conexao = mysqli_connect($host, $user, $pass, $banco,5432);
if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}
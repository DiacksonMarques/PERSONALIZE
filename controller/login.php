<?php

if (!isset($_SESSION)) session_start();
// Verifica se não há a variável da sessão que identifica o usuário
if (isset($_SESSION['Usuid'])) {
    // Redireciona o visitante de volta pro login
    header("Location: ../administrativo/view/dashboard.php");
    exit;
}

//Verificar se veio alguma informação imcompleta
if (!empty($_POST) and (empty($_POST['usuario']) or empty($_POST['senha']))) {
    header("Location: ../../view/index.php");
    exit;
}

//Conexão com o banco
include_once 'conexao.php';

//Pegando dados
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

//Validando Usuario
$veri = $con->prepare("SELECT * FROM empresa WHERE usuario = '$usuario' AND senha ='$senha'");
$veri->execute();
$numero_de_cadastro = $veri->rowCount();

if ($numero_de_cadastro > 0 && $numero_de_cadastro == 1) {
    while ($org = $veri->fetch(PDO::FETCH_ASSOC)) {
        echo 1;
        // Se a sessão não existir, inicia uma
        if (!isset($_SESSION)) session_start();

        $_SESSION['Usuid'] = $org['id'];
        $_SESSION['Usunome'] = $org['nome'];
        $_SESSION['Usuativo'] = $org['ativo'];
        $_SESSION['Usuimg'] = $org['img'];
    }
} else {
    echo 0;
    exit;
}

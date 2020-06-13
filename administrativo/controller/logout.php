<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

//Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['Usuid'])) {
  //Destrói a sessão por segurança
  session_destroy();
  //Redireciona o visitante de volta pro login
  header("Location: ../../view/login.php");
  exit;
}

include_once 'conexao.php';

if ($_SESSION['Usuativo'] == 0) {
    $id = $_SESSION['Usuid'];
    $ativo = 1;
    $update = $con->prepare("UPDATE empresa SET ativo=:ativo WHERE id=:id");
    $update->bindParam(':id',$id,PDO::PARAM_INT);
    $update->bindParam(':ativo', $ativo);
    $update->execute();
    if ($update) {
        session_start(); // Inicia a sessão
        session_destroy(); // Destrói a sessão limpando todos os valores salvos
        header("Location: ../../view/empresa.php");
        exit; // Redireciona o visitante
    }
} else {
    session_start(); // Inicia a sessão
    session_destroy(); // Destrói a sessão limpando todos os valores salvos
    header("Location: ../../view/empresa.php");
    exit; // Redireciona o visitante
}

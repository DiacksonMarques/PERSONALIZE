<?php
//Conexão com o banco
include_once 'conexao.php';

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$slogan = filter_input(INPUT_POST, 'slogan', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$ativo = 0;
$veriusua = $con->prepare("SELECT * FROM empresa WHERE usuario='$usuario'");
$veriusua->execute();
$usuariosqtd = $veriusua->rowCount();

if ($usuariosqtd > 0 && $usuariosqtd == 1) {
    echo 'usuario';
} else {
    //Inserindo dados
    $add = $con->prepare("INSERT INTO empresa SET nome=:nome, slogan=:slogan, telefone=:telefone, usuario=:usuario, senha=:senha, ativo=:ativo");
    $add->bindParam(':nome', $nome);
    $add->bindParam(':slogan', $slogan);
    $add->bindParam(':telefone', $telefone);
    $add->bindParam(':usuario', $usuario);
    $add->bindParam(':senha', $senha);
    $add->bindParam(':ativo', $ativo);
    $add->execute();

    if ($add) {
        echo true;
    } else {
        echo false;
    }
}

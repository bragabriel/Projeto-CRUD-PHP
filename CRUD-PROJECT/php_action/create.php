<?php

//Iniciando a sessão
session_start();

//Conexão
require_once 'db_connect.php';

//Clear - Prevenção à ataques:
function AttackPrevent($input){
    
    global $connect;

    //SQL Injection Prevent:
    $var = mysqli_escape_string($connect, $input);

    //XSS Attack Prevent:
    $var = htmlspecialchars($var);

    return $var;
}

//Verificando se o usuário clicou no botão de índice/name = btn-cadastrar
if(isset($_POST['btn-cadastrar'])){

    //Atribuindo os dados que vieram do form para variáveis:

    //FILTER_SANITIZE = HTML CODE ATTACK PREVENT
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = AttackPrevent($nome);

    $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_SPECIAL_CHARS);
    $sobrenome = AttackPrevent($sobrenome);

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = AttackPrevent($email);

    $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
    $idade = AttackPrevent($idade);

    //Inserindo os dados das variáveis no Banco de Dados na tabela 'clientes':
    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";

    //Verificando se a query(comando sql) foi executada com sucesso:
    if(mysqli_query($connect, $sql)){

        //Criando uma sessão chamada 'mensagem'
        $_SESSION['mensagem'] = "Cliente cadastrado com sucesso!";

        //Se deu certo, retornaremos para a index.php, passando como parâmetro através do link a string: "sucesso"
        header('Location: ../index.php?sucesso');
    }
    else{

        //Criando uma sessão chamada 'mensagem'
        $_SESSION['mensagem'] = "ERRO ao cadastrar!";

        //Se NÃO deu certo, retornaremos para a index.php, passando como parâmetro através do link a string: "erro"
        header('Location: ../index.php?erro');
    }
}

?>
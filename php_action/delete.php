<?php

//Iniciando a sessão
session_start();

//Conexão
require_once 'db_connect.php';

//Verificando se o usuário clicou no botão de índice/name = btn-editar
if(isset($_POST['btn-deletar'])){

    //Atribuindo os dados que vieram do form através do método POST:
    $id = mysqli_escape_string($connect, $_POST['id']);

    //Inserindo os dados das variáveis no Banco de Dados na tabela 'clientes':
    $sql = "DELETE FROM clientes WHERE id = '$id'";

    //Verificando se a query(comando sql) foi executada com sucesso:
    if(mysqli_query($connect, $sql)){

        //Criando uma sessão chamada 'mensagem'
        $_SESSION['mensagem'] = "Deletado com sucesso!";

        //Se deu certo, retornaremos para a index.php, passando como parâmetro através do link a string: "sucesso"
        header('Location: ../index.php?sucesso');
    }
    else{

        //Criando uma sessão chamada 'mensagem'
        $_SESSION['mensagem'] = "ERRO ao deletadar!";

        //Se NÃO deu certo, retornaremos para a index.php, passando como parâmetro através do link a string: "erro"
        header('Location: ../index.php?erro');
    }
}

?>
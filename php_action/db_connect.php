<?php

//Conexão com o Banco de Dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "crud";

$connect = mysqli_connect($servername, $username, $password, $db_name);

//Setando codificação utf-8
//                 conexão, "codificação";
mysqli_set_charset($connect, "utf8");

if(mysqli_connect_error()){
    echo "Erro na conexão com o banco: ".mysqli_connect_error();
}

?>
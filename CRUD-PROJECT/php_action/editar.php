<?php 

//Conexão (DB)
include_once '../php_action/db_connect.php';

//Incluindo o header
include_once '../includes/header.php';


//Select (Verificando se existe o parâmetro ID na URL através da super GLOBAL GET)

if(isset($_GET['id'])){

    //Caso exista, atribuiremos para a variável $id
    $id = mysqli_escape_string($connect, $_GET['id']);

    //Consulta no DB
    $sql = "SELECT * FROM clientes WHERE id = '$id'";

    //Atribuindo o resultado da consulta para a variável $resultado
    //                      "conexão", "consultaSQL"
    $resultado = mysqli_query($connect, $sql);

    //Variável $dados recebe o valor de $resultado ($resultado é a consulta ao Banco de Dados)
    $dados = mysqli_fetch_array($resultado);
}

?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar Cliente</h3>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']?>">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome']?>">
                <label for="sobrenome">Sobrenome</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="email" id="email" value="<?php echo $dados['email']?>">
                <label for="email">E-mail</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="idade" id="idade" value="<?php echo $dados['idade']?>">
                <label for="idade">Idade</label>
            </div>

            <button type="submit" name="btn-editar" class="btn">Atualizar</button>
            <a href="index.php" class="btn green">Lista de Clientes</a>
        </form>
     
    </div>
</div>

<?php 
// Footer
include_once '../includes/footer.php';
?>
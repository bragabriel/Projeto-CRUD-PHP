<?php 

/*************************************/
/*               CRUD                */
/*  Create - Read - Update - Delete  */
/*************************************/

/*  OBS: Utilizando PHP procedural.  */

//Conexão
include_once 'php_action/db_connect.php';

//Incluindo o header
include_once 'includes/header.php';

//Incluindo a mensagem de alerta (Cadastrado com sucesso! / Erro ao cadastrar!)
include_once 'includes/message.php';

?>


<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Clientes</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Sobrenome:</th>
                    <th>Email:</th>
                    <th>Idade:</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $sql = "SELECT * FROM clientes";

                    //Atribuindo o resultado da consulta para a variável $resultado
                    //                      "conexão", "consultaSQL"
                    $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) > 0):

                    //Abrindo WHILE
                    //Variável $dados recebe todos os dados de $resultado ($resultado é a consulta ao Banco de Dados)
                    while($dados=mysqli_fetch_array($resultado)):
                    
                ?>
                <tr>
                    <td><?php echo $dados['nome']; ?></td>
                    <td><?php echo $dados['sobrenome']; ?></td>
                    <td><?php echo $dados['email']; ?></td>
                    <td><?php echo $dados['idade']; ?></td>
                    <td><a href="php_action/editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i
                                class="material-icons">edit</i></a></td>

                    <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i
                                class="material-icons">delete</i></a></td>

                    <!-- Modal Structure -->
                    <div id="modal<?php echo $dados['id']; ?>" class="modal">
                        <div class="modal-content">
                            <h4>Opa!</h4>
                            <p>Tem certeza que deseja excluir esse cliente?</p>
                        </div>
                        <div class="modal-footer">
                            <form action="php_action/delete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                                <a href="#!"
                                    class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </tr>

                <?php
                    //Fechando WHILE
                    endwhile; 
                    
                    //Continuação do IF da linha 43
                else: ?>

                <!--Linhas vazias caso não haja cadastros no Banco para ser exibido-->
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>

                <?php
                    //Fechando IF da linha 43
                    endif;
                ?>

            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class="btn">ADICIONAR CLIENTE</a>
    </div>
</div>


<?php 
    //Incluindo o footer
    include_once 'includes/footer.php';
?>
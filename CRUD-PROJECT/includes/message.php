<?php

//Sessão
session_start();

//Verificando se existe a sessão mensagem:
if(isset($_SESSION['mensagem'])){ 
    ?>

        <script>
            //onload = carrega a função depois que toda a página foi carregada
            window.onload = function(){
                //Mensagem:
                M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'});
            };
        </script>

    <?php
} //fim do if

//Depois que exibiu a mensagem; Limparemos a sessão:
session_unset();

?>
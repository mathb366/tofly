<?php

$servidor = "fdb25.awardspace.net";
$usuario = "2974882_testecube";
$senha_bd = "se3Parqui5";
$banco = "2974882_testecube";
$conexao = new mysqli($servidor, $usuario, $senha_bd, $banco);


$id = $_GET['id'];


echo "<form action='#' method='post'> <input type='submit' value='Confirmar Inscrição'name='botao'> </form>";

if((isset($_POST['botao']))&&(!empty($id))){
 $update = ("UPDATE usuarios SET estado = 1 WHERE md5(id) = '$id'");
 $insert = mysqli_query($conexao, $update);
 if($insert){
echo "Usuário Confirmado com Sucesso.";
echo "<META HTTP-EQUIV='Refresh'CONTENT='3;URL=index.html'>";

   }
}


?>
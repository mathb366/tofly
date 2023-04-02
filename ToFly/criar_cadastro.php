<?php
 $nome = addslashes($_POST['nome']);
 $email = addslashes($_POST['email']);
 $senha = addslashes($_POST['senha']);
 $senhaSegura = password_hash($senha, PASSWORD_DEFAULT);
 $servidor = "fdb25.awardspace.net";
 $usuario = "2974882_testecube";
 $senha_bd = "se3Parqui5";
 $banco = "2974882_testecube";

 $conexao = new mysqli($servidor, $usuario, $senha_bd, $banco);

 $insert = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senhaSegura')";

  $select = "SELECT email FROM cubeland WHERE email = '$email'";

 if($email == "" || $email == NULL){
echo "<script>alert('Você deve preencher o campo de Email!');window.location.href='cadastro.html';</script>";
}
elseif($arranjo_email == $email){
echo "<script>alert('Este Login já Existe!');window.location.href='cadastro.html';</script>";
}
 elseif($conexao->connect_error) {
 die("<script>alert('Sem conexão com Banco de dados.');window.location.href='cadastro.html';</script>");
 }

elseif(mysqli_query($conexao, $insert)){
$id = mysqli_insert_id($conexao);
$assunto = "Confirme seu cadastro.";
$header = "From: Cube Land";
$mensagem ="http://www.iniciativatofly.com.br/confirma_cadastro.php?id=".$id;
mail($email, $assunto, $mensagem, $header);

echo "<script>alert('Usuário Cadastrado com Sucesso!');window.location.href='index.html';</script>";
 
} 
else
echo "<script>alert('Não foi possível cadastrar o usuário. Entre em contato com o administrador do site. suporte@SEU_DOMINIO.com.');window.location.href='cadastro.html';</script>";
mysqli_close($conexao)
 
 
?>

 
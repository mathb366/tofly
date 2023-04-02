<?php
$servidor = "fdb25.awardspace.net";
$usuario = "2974882_testecube";
$senha_bd = "se3Parqui5";
$banco = "2974882_testecube";
$lembrete_senha = $_POST['Principal'];

$conexao = new mysqli($servidor, $usuario, $senha_bd, $banco);

$_SESSION['login'] = $login;
$select = "SELECT * FROM usuarios WHERE email = '$login'";
$consulta_select = mysqli_query($conexao, $select);
$arranjo = mysqli_fetch_array($consulta_select);
$arranjo_email = $arranjo['email'];


if (isset($entrar)) {
$verifica = (mysqli_query($conexao, "SELECT * FROM usuarios WHERE
email = '$login'"));
$resultado = (mysqli_num_rows($verifica));
if ($resultado<=0){
echo"<script>alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";
}elseif ($lembrete_senha == 1){
setcookie("login",$login,time()+(60*60*24));
setcookie("senha",$senha,time()+(60*60*24));
header("Location:logado.php");
$_SESSION['login'] = $login;
}else{
$_SESSION['login'] = $login;
header("Location:logado.php");
}
}
mysqli_close($conexao);
?>

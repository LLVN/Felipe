<?php 
require_once("_con.php");
$login = $_POST['login'];
$senha = $_POST['senha'];

if (!empty($_POST) AND (empty($_POST['login']) OR empty($_POST['senha']))){
	echo("campos inválidos");      	
	header("Location: login.html"); 
	exit;
}

$dbc = mysqli_connect($host,$user,$pass, $db);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'";

$retornoQuery= mysqli_query($dbc, $query);

$row=mysqli_fetch_row($retornoQuery);

//var_dump($row);
echo ($row[1]);

// $resultado = mysql_fetch_assoc($query);

// while($row = mysql_fetch_assoc($verifica)){
// 	$unidade_ferativa = $row["unidade_federativa"];
// 	$endereco = $row["endereço"];
// }

// if (mysql_num_rows($verifica) > 0){
// 	session_start();
// 	$_SESSION['login']=$login;
//         $_SESSION['senha']=$_POST['senha'];
// 	$_SESSION['unidade_federativa']=$unidade_federativa;
// 	$_SESSION['endereço']=$endereco;
// 	setcookie("login",$login);
// 	header('Location: pagina_inicial.html');
// }else {
// 	session_destroy();
// 	unset ($_SESSION['login']);
// 	unset ($_SESSION['senha']);
// 	unset ($_SESSION['unidade_federativa']);
// 	unset ($_SESSION['endereço']);
//        	//die();

// 	header("Location:index.php");
// }

//header('Location: pagina_inicial.html');

?>
<?php

require_once ("Mail.php");

$nome = $_POST['name'];
$email = $_POST['email'];
$unidade = $_POST['unidade'];
$message = $_POST['message'];
$matricula = $_POST['matricula'];

//Salvar

$servername = "localhost";
$username = "nabuco";
$password = "";
$dbname = "nabuco";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `inscricao` (`id`, `nome`, `matricula`, `email`, `unidade`, `deficiente`, `observacao`) VALUES (NULL, '".$nome."', '".$matricula."', '".$email."', '".$unidade."', '0', '".$message."');";
    // use exec() because no results are returned
    $conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;


//Enviar email

echo "Sucesso";

header("location:index.php?inscrito=true");
?>
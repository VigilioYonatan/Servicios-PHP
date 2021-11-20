<?php
$pdo = new PDO('mysql:host=localhost;dbname=outsourcing;charset-utf8','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$like = "'"."%".$_GET["query"]."%"."'";
$sql = "SELECT * FROM usuarios WHERE user_nombre LIKE $like and user_rol=7";

$stm = $pdo->prepare($sql);
$stm->execute();
$res = $stm->fetchAll(PDO::FETCH_OBJ);

echo json_encode($res);
?>